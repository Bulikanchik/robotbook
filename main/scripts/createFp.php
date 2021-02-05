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
    
    
    
        $url = "https://graph.facebook.com/graphql";
    
    
        $post_data = array (
            'locale' => 'en_US',
            'access_token' => $row['access_token'],
            'fb_api_caller_class' => 'RelayModern',
            'fb_api_req_friendly_name' => 'IgPromoteNonDiscriminationPolicyMutation',
            'variables' => json_encode( array(
                'input' => array(
                        'client_mutation_id' => '2',
                        'name' => $_SESSION['names'][$current_numb],
                        'category' => '2201',
                        'actor_id' => $row['acc_id'],
                        'ref' => 'instagram_creation_flow'
                    )
                )),
            'doc_id' => '1541751832609579'
            );
           
        
        $headers = array (
            'Host' => 'graph.facebook.com',
            'User-Agent' => 'Instagram 143.0.0.25.121 Android (26/8.0.0; 320dpi; 720x1184; Genymotion/Android; Motorola Moto X; vbox86p; vbox86; en_US; 216817367)',
            'Accept-Language' => 'en-US',
            'Content-Type' => 'application/x-www-form-urlencoded'
            );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if($proxy) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $login_password); 
        }
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        
        
        $output = json_decode(curl_exec($ch));
        if(is_null($output)) 
            $output = json_decode(curl_exec($ch));
        
        
        $curl_info = curl_getinfo($ch);
        $curl_error = curl_error($ch);
        
        $post_descr = curl_copy_handle($ch);
        
        curl_close($ch);
        
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
        
        $log = "CREATE FP ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        
        
        $name = $output->data->page_create->page->name;
        $fp_id = $output->data->page_create->page->id;
        $category = $output->data->page_create->page->category_name;
        $fp_token = $output->data->page_create->page->admin_info->access_token;
        $queryAdd = $link->query("INSERT INTO Fp_Id (name,fp_token,instagram_actor_id,access_token,category,fp_id,is_published) VALUES ('".$name."', '".$fp_token."', '', '".$access_token."', '".$category."', '".$fp_id."', '1')");
        $queryUp = $link->query("UPDATE Tokenbase SET fp = '+' WHERE access_token = '".$access_token."'");
        
        $_SESSION['query'][] = $queryAdd;
    
    }

    header('Location: createFp.php');
}
?>
