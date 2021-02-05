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
        include($_SERVER['DOCUMENT_ROOT']."/post.php");
        $log = "PREVIEW ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        header('Location: uploadFile.php');
        exit();
    }
    else
        $firstoutput = $output;
} 
   
$queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    
    
    



$file = 'creo/'.$_SESSION['creos'][0];

if(!exif_imagetype($file))
    if(isset($_SESSION['is_preview'])) {
        
        include('uniq.php');
           
        
        $fileend = $_SESSION['preview_type'];
        $name = $_SESSION['previews'];
        $copy_filename
                = "preview/".uniqid().".".$fileend;    
            
        if(copy("preview/".$name.".".$fileend, $copy_filename))
            Uniq::image($copy_filename, $copy_filename);
    
    
        $_SESSION['stade'][$current_numb][] = 'preview';
        $url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/adimages";
        
        
                
        $post_data = array (
            "access_token" => $row['access_token'],
            "filename" => new CURLFILE($copy_filename)
        );
        
        include($_SERVER['DOCUMENT_ROOT']."/post.php");
        
        if(is_null($output)) 
            include($_SERVER['DOCUMENT_ROOT']."/post.php");
        
        $log = "PREVIEW ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
    
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
            else if($output->error->error_subcode == '1885316'){
                $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
            }
            else 
                $_SESSION['fatalError'] = $output->error->error_user_title." ".$output->error->error_user_msg;
            
            header('Location: uploadFile.php');
            exit();
        
        }  
        else {
           
            $output = json_encode($output);
            
            
            $output = str_replace("\"", "", $output);
            preg_match('/url:https:.*/', $output, $matches);
            $image_url = str_replace("url:", "", $matches[0]);
            $image_url = str_replace("}", "", $image_url);
            $image_url = str_replace("\\", "", $image_url);
    
        
        
            $_SESSION['preview'] = $image_url;
           
        }
        
    }

$_SESSION['output'][$current_numb][1] = $output;
header('Location: campaign.php');
exit();


?>