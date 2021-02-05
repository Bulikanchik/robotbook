<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


$ERROR = '';



$current_numb = (int)$_SESSION['current_numb'];



    
$queryRk = $link->query("SELECT * FROM Rk_Id WHERE rk_id='".$_SESSION['numbers'][$current_numb]."'");
$rowRk = mysqli_fetch_array($queryRk, MYSQLI_ASSOC);

$query = $link->query("SELECT * FROM Tokenbase WHERE access_token='".$rowRk['access_token']."'");
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);


$access_token = $row['access_token'];
if($row['user_agent'] != '')
    $user_agent = $row['user_agent'];
if($row['proxy'] != ''){
    $proxy = explode("//", explode("@", $row['proxy'])[0])[1];
    $login_password = explode("@", $row['proxy'])[1];
}



if((time() - strval($row['reftime'])) > 1800) {
    
    $url = "https://graph.facebook.com/v7.0/me/?access_token=".$access_token;
    
    
    include($_SERVER['DOCUMENT_ROOT']."/get.php");
    
    
    if($output->error) {
        
        $ERROR = $output->error->message;
        $_SESSION['error'][$current_numb] = $output->error->error_subcode;
        if($output->error->error_subcode == '459') {
            $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
            $queryUp = $link->query("UPDATE Tokenbase SET state='Selfy' WHERE access_token='".$access_token."'");
        }
        else if($output->error->error_subcode == '452'){
            $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
            $queryUp = $link->query("UPDATE Tokenbase SET state='Check Passwd' WHERE access_token='".$access_token."'");
        }
        $log = "IS UPLOAD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        header('Location: uploadFile.php');
        exit();
    }
    else
        $firstoutput = $output;
} 
   
$queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 

    
    
    


$file = 'creo/'.$_SESSION['creos'].'.'.$_SESSION['creo_type'];


if(!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
    $count = 0;
}
else
    $count = (int)$_SESSION['count'] + 1;

if($count == 30){
    $_SESSION['error'][$current_numb] = 'Видео не загрузилось на фб';
    header('Location: uploadFile.php');
}
else    
    if($ERROR == '')
        if(!exif_imagetype($file)) {
            
            sleep(10); 
            $_SESSION['stade'][$current_numb][] = 'is_upload';
            $url = "https://graph.facebook.com/v7.0/".$_SESSION['file_id']."?fields=status,picture&access_token=".$row['access_token'];
             
             
            include($_SERVER['DOCUMENT_ROOT']."/get.php");
            
            if(is_null($output)) 
                include($_SERVER['DOCUMENT_ROOT']."/get.php");
            
            if($output->error) {
                $ERROR = $output->error->message;
                $_SESSION['error'][$current_numb] = $output;
                if($output->error->error_subcode == '459') {
                    $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                    $queryUp = $link->query("UPDATE Tokenbase SET state='Selfy' WHERE access_token='".$access_token."'");
                }
                else if($output->error->error_subcode == '452'){
                    $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                    $queryUp = $link->query("UPDATE Tokenbase SET state='Check Passwd' WHERE access_token='".$access_token."'");
                }
                else if($output->error->error_subcode == '1885316'){
                    $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                }
                else 
                    $_SESSION['fatalError'] = $output->error->error_user_title." ".$output->error->error_user_msg;
            
                $log = "IS UPLOAD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
                file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
                    
                header('Location: uploadFile.php');
                exit();
            }    
            else {
                if($output->status->video_status == "ready") {
                    $image_url = $output->picture;
                    $_SESSION['image_url'] = $image_url;
                    $log = "IS UPLOAD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
                    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
                    header('Location: preview.php');
                    exit();
                }
                else {
                    
                    header('Location: is_upload.php');
                    exit();
                }
            }
        }
        else {
            $log = "IS UPLOAD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
            header('Location: campaign.php'); 
            exit();
        }
    
?>