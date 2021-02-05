<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


$ERROR = '';

if(isset($_SESSION['first'])){
    $current_numb = 0;
    unset($_SESSION['first']);
    $_SESSION['current_numb'] = "0";
}
else {
    $_SESSION['current_numb']  = (int)($_SESSION['current_numb']) + 1;
    $current_numb = (int)$_SESSION['current_numb'];
}


if($current_numb == count($_SESSION['numbers'])) {
    $f = scandir('creo/');
    unset($f[0],$f[1]);
    foreach($f as $value)
        unlink('creo/'.$value);
        
    $f = scandir('preview/');
    unset($f[0],$f[1]);
    foreach($f as $value)
        unlink('preview/'.$value);
        
    print_r(json_encode($_SESSION));
    session_unset();
    exit();
}
else {   
    
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




    include('uniq.php');
       
       
    
    $fileend = $_SESSION['creo_type'];
    $name = $_SESSION['creos'];
    if(exif_imagetype("creo/".$name.".".$fileend)) {
    
        $copy_filename
                = "creo/".uniqid().".".$fileend;    
            
        if(copy("creo/".$name.".".$fileend, $copy_filename))
            Uniq::image($copy_filename, $copy_filename);
    }
    else {
       
        $copy_filename
                = "creo/".uniqid().".".$fileend;  
        
        if(copy("creo/".$name.".".$fileend, $copy_filename))
            echo '';
            //Uniq::video($copy_filename, $copy_filename);
        sleep(5);
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
            else 
                $_SESSION['fatalError'] = $output->error->error_user_title." ".$output->error->error_user_msg;
            
            $log = "UPLOAD FILE ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
            header('Location: uploadFile.php');
            exit();
        }
        else
            $firstoutput = $output;
    } 
       
    $queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
        
    if($ERROR == '') {
        
        $_SESSION['stade'][$current_numb][] = 'uploadFile';
        if(exif_imagetype($copy_filename)) 
            $url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/adimages";
        else
            $url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/advideos";
        
        
        if(exif_imagetype($copy_filename))
            $post_data = array (
                "access_token" => $row['access_token'],
                "filename" => new CURLFILE($copy_filename)
            );
        else
            $post_data = array (
                "access_token" => $row['access_token'],
                "file_url" => 'http://'.$_SERVER['HTTP_HOST'].'/main/scripts/createAd/'.$copy_filename
            );
        
        
        include($_SERVER['DOCUMENT_ROOT']."/post.php");
        
        if(is_null($output)) 
            include($_SERVER['DOCUMENT_ROOT']."/post.php");
        
        
        $_SESSION['output'][$current_numb][0] = $output;
    
    
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
            
            
            
            $log = "UPLOAD FILE ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
            header('Location: uploadFile.php');
            exit();
        }
        else {
            if(exif_imagetype($copy_filename)) {
                $output = json_encode($output);
                
                
                $output = str_replace("\"", "", $output);
                preg_match('/hash:[0-9a-zA-Z]*/', $output, $matches);
                $file_id = str_replace("hash:", "", $matches[0]);
            } 
            else {
                $file_id = $output->id;
            }
        
        
        $_SESSION['file_id'] = $file_id;
        }
    
    
    }
    
$log = "UPLOAD FILE ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);

header('Location: is_upload.php');
exit();
} 
?>