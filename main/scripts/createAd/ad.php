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
        $log = "AD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        header('Location: uploadFile.php');
        exit();
    }
    else
        $firstoutput = $output;
} 
   
$queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    
    
    
$queryFp = $link->query("SELECT * FROM Fp_Id WHERE access_token='".$rowRk['access_token']."'");
$rowFp = mysqli_fetch_array($queryFp, MYSQLI_ASSOC);



$file = 'creo/'.$_SESSION['creos'].'.'.$_SESSION['creo_type'];


$urls = explode("\n", $_SESSION["url"]);
//$_SESSION["url"] = str_replace($urls[$current_numb]."\n", "", $_SESSION["url"]);
//$_SESSION["oneurl"] = $urls[strval($_SESSION['currentAcc'])];

$currentUrl = $urls[strval($_SESSION['currentAcc'])];
$currentUrl = preg_replace('/\s/', '', $currentUrl);
$currentUrl = preg_replace('/\r/', '', $currentUrl);


if(isset($_SESSION['is_pixel']))
    $currentUrl = $currentUrl.'&'.$_SESSION['pixel_name'].'='.$rowRk['pixel_id'];    
/*Инстаграм*/
if($rowFp['instagram_actor_id'] == '') {
    $url = "https://graph.facebook.com/v7.0/".$rowFp['fp_id']."/page_backed_instagram_accounts?access_token=".$row['access_token'];


    if($row['user_agent'] != '')
        $headers = array (
            'Host'=> 'graph.secure.facebook.com',
            'User-Agent'=> $row['user_agent']
        );
    else
        $headers = array (
            'Host'=> 'graph.secure.facebook.com'
        );
    
    
    include($_SERVER['DOCUMENT_ROOT']."/post.php");
    
    
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
            
        $log = "AD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        header('Location: uploadFile.php');
        exit();
    
    }  
    
    
    $queryUp = $link->query("UPDATE Fp_Id SET instagram_actor_id='".$output->data[0]->id."' WHERE fp_id='".$rowFp['fp_id']."'");
    $instagram_actor_id = $output->data[0]->id;
    
}
else
    $instagram_actor_id = $rowFp['instagram_actor_id'];   




$_SESSION['stade'][$current_numb][] = 'ad';





/*Креатив*/
$object_story_spec = array(
    "page_id" => $rowFp['fp_id'],
    "instagram_actor_id" => $instagram_actor_id
);


if(!exif_imagetype($file)){
    if(isset($_SESSION['is_preview']))
        $video_data = array(
            "video_id" => $_SESSION['file_id'],
            "call_to_action" => array(
                            'type' => $_SESSION['call_to_action'],
                            'value' => array( 'link' => $currentUrl ),
                         ), 
            "image_url" => $_SESSION['preview']
            );
    else
        $video_data = array(
            "video_id" => $_SESSION['file_id'],
            "call_to_action" => array(
                            'type' => $_SESSION['call_to_action'],
                            'value' => array( 'link' => $currentUrl ),
                         ), 
            "image_url" => $_SESSION['image_url']
            );
    
    if($_SESSION['title'] != '')
        $video_data["title"] = $_SESSION['title'];
    if($_SESSION['message'] != '')
        $video_data["message"] = $_SESSION['message'];
    if($_SESSION['description'] != '')
        $video_data["link_description"] = $_SESSION['description'];
}
else {
    $link_data = array(
            "link" => $currentUrl,
            "image_hash" => $_SESSION['file_id'],
            "call_to_action" => array('type' => $_SESSION['call_to_action'])
    );
    
    if($_SESSION['title'] != '')
        $link_data["name"] = $_SESSION['title'];
    if($_SESSION['message'] != '')
        $link_data["message"] = $_SESSION['message'];
    if($_SESSION['description'] != '')
        $link_data["description"] = $_SESSION['description'];
}


if(exif_imagetype($file))
    $object_story_spec['link_data'] = $link_data;
else 
    $object_story_spec['video_data'] = $video_data;

if($_SESSION['ad_name'] == '' || !isset($_SESSION['ad_name']))
    $_SESSION['ad_name'] = 'Новое объявление';
$creative = array (
    "page_id" => $rowFp['fp_id'],
    "actor_id" => $rowFp['fp_id'],
    "effective_object_story_id" => $rowFp['fp_id'],
    "instagram_actor_id" => $instagram_actor_id,
    "name" => $_SESSION['ad_name'],
    "object_story_spec" => json_encode($object_story_spec)
); 



/*            Ад            */
if(isset($_SESSION['ad_status']))
    $status = 'ACTIVE';
else 
    $status = 'PAUSED';



$url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/ads";
    
    
if($row['user_agent'] != '')
    $headers = array (
        'Host'=> 'graph.secure.facebook.com',
        'User-Agent'=> $row['user_agent']
    );
else
    $headers = array (
        'Host'=> 'graph.secure.facebook.com'
    );
    
        
$post_data = array (
    "access_token" => $row['access_token'],
    "name" => $_SESSION['ad_name'],
    "status" => $status,
    "adset_id" =>  $_SESSION['adset_id'],
    "creative" => json_encode($creative)
);



include($_SERVER['DOCUMENT_ROOT']."/post.php");
if(is_null($output)) 
    include($_SERVER['DOCUMENT_ROOT']."/post.php");
    
$log = "AD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);

if($output->error) {
    $ERROR = $output->error->message;
    $_SESSION['error'][$current_numb] = $output;
    //$_SESSION['error'][$current_numb] = $output->error->error_subcode;
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
    
    $queryAd = $link->query("INSERT INTO Ad_Id (name, ad_id, adset_id, access_token) VALUES ('".$_SESSION['ad_name']."', '".$output->id."', '".$_SESSION['adset_id']."', '".$row['access_token']."')");
    
    
    $_SESSION['output'][$current_numb][4] = $output;
    header('Location: copyAdset.php');
    exit();    
    
}







?>