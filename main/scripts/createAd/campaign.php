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
        $log = "CAMPAIGN ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        header('Location: uploadFile.php');
        exit();
    }
    else
        $firstoutput = $output;
} 
   
$queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    
    
    


$_SESSION['stade'][$current_numb][] = 'campaign';
$url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/campaigns";
  

  
//Статус
if(isset($_SESSION['campaign_status']))
    $status = 'ACTIVE';
else 
    $status = 'PAUSED';

if($_SESSION['camp_name'] == '' || !isset($_SESSION['camp_name']))
    $_SESSION['camp_name'] = 'Новая кампания';
    
if($_SESSION['place_daily_budget'] == 'campaign_daily_budget')
    $post_data = array (
        "access_token" => $row['access_token'],
        "special_ad_categories" => "NONE",
        "daily_budget" => (string)(((int)$_SESSION['daily_budget'])*100),
        "name" => $_SESSION['camp_name'],
        "objective" => $_SESSION['objective'],
        "status" => $status
    );
else 
    $post_data = array (
        "access_token" => $row['access_token'],
        "special_ad_categories" => "NONE",
        "name" => $_SESSION['camp_name'],
        "objective" => $_SESSION['objective'],
        "status" => $status
    );
 
if($_SESSION['place_daily_budget'] == 'campaign_daily_budget')
    $post_data['bid_strategy'] = $_SESSION['bid_strategy'];


include($_SERVER['DOCUMENT_ROOT']."/post.php");
if(is_null($output)) 
    include($_SERVER['DOCUMENT_ROOT']."/post.php");
            
$log = "CAMPAIGN ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
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
           
    header('Location: uploadFile.php');
    exit();

}  
else {
    
    $_SESSION['campaign_id'] = $output->id;
    $queryCamp = $link->query("INSERT INTO Camp_Id (name, camp_id, rk_id, access_token) VALUES ('".$_SESSION['camp_name']."', '".$output->id."', '".$rowRk['rk_id']."', '".$row['access_token']."')");
    
    $_SESSION['output'][$current_numb][2] = $output;
    header('Location: adset.php');
    exit();    
    
}







?>