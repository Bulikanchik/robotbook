<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


$ERROR = '';

if(isset($_POST['first'])){
    $current_numb = 0;
    session_unset();
    $_SESSION['names'] = $_POST['names'];
    $_SESSION['info'] = $_POST['numbers'];
    $_SESSION['current_numb'] = "0";
}
else {
    $_SESSION['current_numb']  = (int)($_SESSION['current_numb']) + 1;
    $current_numb = (int)$_SESSION['current_numb'];
}



//print_r($_SESSION);


if($current_numb == count($_SESSION['info'])) {
    print_r(json_encode($_SESSION));
    session_unset();
    exit();
}
else {           

    
    
    $query = $link->query("SELECT * FROM Tokenbase WHERE number='".$_SESSION['info'][$current_numb]."'");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC); 
    $access_token = $row['access_token'];
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
    
    $queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    if($ERROR == '') {
    
    
        $queryFp = $link->query("SELECT * FROM Fp_Id WHERE access_token='".$access_token."'");
        $rowFp = mysqli_fetch_array($queryFp, MYSQLI_ASSOC);
        
        
        
        $url = "https://graph.facebook.com/v7.0/".$rowFp['fp_id']."?access_token=".$rowFp['fp_token']."&is_published=true";
        
        
        include($_SERVER['DOCUMENT_ROOT']."/post.php");
        if(is_null($output)) 
            include($_SERVER['DOCUMENT_ROOT']."/post.php");
    
        if($output->error) {
            $ERROR = $output->error->message;
            $_SESSION['error'][$current_numb] = $output->error->error_subcode;
        }
       
      
      
      
        $_SESSION['output'][$current_numb] = $output;
        
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
        
        $log = "PUBLISH FP ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        
        
        $queryUp = $link->query("UPDATE Fp_Id SET is_published = '1' WHERE name = '".$rowFp['name']."'");
        $_SESSION['query'][] = $queryAdd;
    
    }

    header('Location: publishFp.php');
}
?>
