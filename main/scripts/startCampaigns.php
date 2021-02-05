<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


$ERROR = '';

if(isset($_POST['first'])){
    $current_numb = 0;
    session_unset();
    $_SESSION['numbers'] = $_POST['numbers'];
    $_SESSION['current_numb'] = "0";
}
else {
    $_SESSION['current_numb']  = (int)($_SESSION['current_numb']) + 1;
    $current_numb = (int)$_SESSION['current_numb'];
}



if($current_numb == count($_SESSION['numbers'])) {
    print_r(json_encode($_SESSION));
    session_unset();
    exit();
}
else {   
    
    $queryCamp = $link->query("SELECT * FROM Camp_Id WHERE camp_id='".$_SESSION['numbers'][$current_numb]."'");
    $rowCamp = mysqli_fetch_array($queryCamp, MYSQLI_ASSOC);
    
    $query = $link->query("SELECT * FROM Tokenbase WHERE access_token='".$rowCamp['access_token']."'");
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
        }
        else
            $firstoutput = $output;
    } 
       
        
    if($ERROR == '') {
        
        $url = "https://graph.facebook.com/v7.0/".$rowCamp['camp_id'];

        
        $post_data = array (
                "access_token" => $row['access_token'],
                "status" => 'ACTIVE'
            );
        
        include($_SERVER['DOCUMENT_ROOT']."/post.php");
        if(is_null($output)) 
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
            else if($output->error->error_subcode == '1885316'){
                $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
            }
            else 
                $_SESSION['fatalError'] = $output->error->error_user_title." ".$output->error->error_user_msg;
           
        }
    }
  
    $queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    if($ERROR == '') 
        if($output->success) 
            $queryUp = $link->query("UPDATE Camp_Id SET state='ACTIVE' WHERE camp_id='".$rowCamp['camp_id']."'");
    else 
        $queryUp = $link->query("UPDATE Rk_Id SET state = 'ERROR' WHERE rk_id = '".$rowCamp['rk_id']."'");
       
    
    $log = "START CAMPAIGNS ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
    
    
    
    $_SESSION['firstoutput'][$current_numb] = $firstoutput;
    $_SESSION['output'][$current_numb] = $output;
    
    
    header('Location: startCampaigns.php');
}

?>