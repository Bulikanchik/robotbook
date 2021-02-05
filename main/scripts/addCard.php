<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


require $_SERVER['DOCUMENT_ROOT'].'/main/vendor/autoload.php';

use \Curl\Curl;


$ERROR = '';

if(isset($_POST['first'])){
    $current_numb = 0;
    session_unset();
    $cards = explode("\n", $_POST['cards']);
    $_SESSION['cards'] = $cards;
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
        }
        else
            $firstoutput = $output;
    } 
       
        
    if($ERROR == '') {
        
        $curl = new Curl();
   
        $user_id = $row['acc_id'];
        $card = explode(":", $_SESSION['cards'][$current_numb])[0];
        $moth = explode('/', explode(":", $_SESSION['cards'][$current_numb])[1])[0];
        $year = explode('/', explode(":", $_SESSION['cards'][$current_numb])[1])[1];
        $cvv = explode(":", $_SESSION['cards'][$current_numb])[2];
        $adAccId = str_replace("act_", "", $rowRk['rk_id']);
        
        
        $curl->setProxy(explode(":", $proxy)[0], explode(":", $proxy)[1], explode(":", $login_password)[0], explode(":", $login_password)[1]);
        $curl->setProxyTunnel();
        
       
        $curl->setDefaultJsonDecoder($assoc = true);
        $curl->setHeader('Authorization', 'OAuth ' . $access_token);
        $curl->setHeader('X-Fb-Connection-Type', 'wifi');
        $curl->setHeader('X-Fb-Sim-Hni', '25001');
        $curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
        $curl->setHeader('Content-Encoding', 'gzip, deflate');
        $curl->setHeader('User-Agent', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A356 Safari/604.1');
        
       
        $curl->post('https://graph.secure.facebook.com/ajax/payment/token_proxy.php?tpe=/'. $user_id .'/creditcards',  array(
        'make_ads_primaty_funding_source' => '1',
        'app_version' => '22916291',
        'payment_type' => 'ads_invoice',
        'locale' => 'ru_RU',
        'billing_address' => '{"country_code":"UA"}',
        'sdk' => 'ios',
        'sdk_version' => '3',
        'risk_features' => '{"CreditCardFormType":"mobile","MobilePlatform":"iOS"}',
        'pretty' => '0',
        'creditCardNumber' => $card,
        'expiry_year' => $year,
        'expiry_month' => $moth,
        'csc' => $cvv,
        'account_id' => $adAccId,
        'format' => 'json',
        'fb_api_req_friendly_name' => 'add_credit_card',
        'fb_api_caller_class' => 'com.facebook.payments.common.PaymentNetworkOperationHelper'
        )); 
        
        $output = $curl->response;
        if(is_null($output)) 
            $output = $curl->response;
        $_SESSION['output'][$current_numb] = $output;
        $_SESSION['error'][$current_numb] = $output['error'];
        if(isset($output['error'])) {
            
            $ERROR = $output['error']['message'];
            $_SESSION['error'][$current_numb] = $output['error']['error_subcode'];
            if($output['error']['error_subcode'] == '459') {
                $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                $queryUp = $link->query("UPDATE Tokenbase SET state='Selfy' WHERE access_token='".$access_token."'");
            }
            else if($output['error']['error_subcode'] == '452'){
                $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                $queryUp = $link->query("UPDATE Tokenbase SET state='Check Passwd' WHERE access_token='".$access_token."'");
            }
            else if($output['error']['error_subcode'] == '1885316'){
                $queryUp = $link->query("UPDATE Rk_Id SET state='ERROR' WHERE access_token='".$access_token."'");
                $_SESSION['error'][$current_numb] = $output['error'];
            }
            else {
                $_SESSION['fatalError'] = $output['error']['error_user_title']." ".$output['error']['error_user_msg'];
                $_SESSION['error'][$current_numb] = $output['error'];
            }
        }
        
    }
    
    $queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    if($ERROR == '') {
        
        $url = "https://graph.facebook.com/v7.0/me/adaccounts?fields=adspixels,promote_pages{access_token,id,name,page_backed_instagram_accounts,category},insights.date_preset(lifetime),campaigns{name,effective_status,adsets{name,effective_status,ads.date_preset(lifetime).time_increment(lifetime).limit(500){insights.limit(500).date_preset(lifetime){results,relevance_score,inline_link_click_ctr,inline_link_clicks,ctr,cpc,cpm},creative{effective_object_story_id,effective_instagram_story_id,actor_id},adlabels,created_time,recommendations,updated_time,ad_review_feedback,bid_info,configured_status,delivery_info,status,effective_status,adcreatives.limit(500){place_page_set_id,object_story_spec{instagram_actor_id,link_data{link},page_id},image_crops,image_url,status,thumbnail_url},result,cost_per_lead_fb,name,clicks,spent,cost_per,reach,link_ctr,impressions}}},date{lifetime},funding_source_details,business{name,link},adrules_library{name},current_unbilled_spend,adspaymentcycle,spend_cap,amount_spent,age,disable_reason,account_status,balance,all_payment_methods{pm_credit_card{account_id,credential_id,display_string,exp_month,exp_year}},currency,timezone_name,created_time,name,status,adtrust_dsl&access_token=".$access_token;

        
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
        
        foreach($output->data as $data) {
            //rk
            $card = $data->all_payment_methods->pm_credit_card->data[0]->display_string;
            $rk_id = $data->id;
            
        
            if(in_array($rk_id, $_SESSION['numbers']))
                $queryUp = $link->query("UPDATE Rk_Id SET card='".$card."' WHERE rk_id='".$rk_id."'");
                
            
        }
    }
    
    $log = "ADD CARD ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
    
    
    $_SESSION['firstoutput'][$current_numb] = $firstoutput;
    
    
    
    header('Location: addCard.php');
}
?>