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
        $log = "ADSET ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);
        header('Location: uploadFile.php');
        exit();
    }
    else
        $firstoutput = $output;
} 
   
$queryUp = $link->query("UPDATE Tokenbase SET reftime='".strval(time())."' WHERE access_token='".$access_token."'"); 
    
    
    
    


$_SESSION['stade'][$current_numb][] = 'adset';


$url = "https://graph.facebook.com/v7.0/".$rowRk['rk_id']."/adsets";

if(isset($_SESSION['adset_status']))
    $status = 'ACTIVE';
else 
    $status = 'PAUSED';


if($_SESSION['adset_name'] == '' || !isset($_SESSION['adset_name']))
    $_SESSION['adset_name'] = 'Новая группа объявлений';
    
$post_data = array (
    "access_token" => $row['access_token'],
    "name" => $_SESSION['adset_name'],
    "billing_event" => 'IMPRESSIONS',
    "campaign_id" => $_SESSION['campaign_id'],
    "status" => $status
    );

$promoted_object = array('pixel_id' => $rowRk['pixel_id'],'custom_event_type' => 'LEAD');
/*Добавить custom_event_type  {RATE, TUTORIAL_COMPLETION, CONTACT, CUSTOMIZE_PRODUCT, DONATE, FIND_LOCATION, SCHEDULE, START_TRIAL, SUBMIT_APPLICATION, SUBSCRIBE, ADD_TO_CART, ADD_TO_WISHLIST, INITIATED_CHECKOUT, ADD_PAYMENT_INFO, PURCHASE, LEAD, COMPLETE_REGISTRATION, CONTENT_VIEW, SEARCH, SERVICE_BOOKING_REQUEST, MESSAGING_CONVERSATION_STARTED_7D, LEVEL_ACHIEVED, ACHIEVEMENT_UNLOCKED, SPENT_CREDITS, LISTING_INTERACTION, D2_RETENTION, D7_RETENTION, OTHER}*/
if($_SESSION['objective'] == 'CONVERSIONS') {
    $post_data['promoted_object'] = json_encode($promoted_object);
    
    
    if($_SESSION['attribution_spec'] == '1 click')    
    $post_data['attribution_spec'] = json_encode(array(
            array('event_type' => 'CLICK_THROUGH',
                'window_days' => 1
            )
        ));    
    if($_SESSION['attribution_spec'] == '7 click')    
        $post_data['attribution_spec'] = json_encode(array(
                array('event_type' => 'CLICK_THROUGH',
                    'window_days' => 7
                )
            ));  
    if($_SESSION['attribution_spec'] == '1 click 1 view')    
        $post_data['attribution_spec'] = json_encode(array(
                array('event_type' => 'CLICK_THROUGH',
                    'window_days' => 1
                ),
                array('event_type' => 'VIEW_THROUGH',
                    'window_days' => 1
                )
            ));  
    if($_SESSION['attribution_spec'] == '7 click 1 view')    
        $post_data['attribution_spec'] = json_encode(array(
                array('event_type' => 'CLICK_THROUGH',
                    'window_days' => 7
                ),
                array('event_type' => 'VIEW_THROUGH',
                    'window_days' => 1
                )
            ));     
}
    
    
if($_SESSION['place_daily_budget'] == 'adset_daily_budget')
    $post_data['daily_budget'] = (string)(((int)$_SESSION['daily_budget'])*100);
if($_SESSION['bid_strategy'] != 'LOWEST_COST_WITHOUT_CAP')
    $post_data['bid_amount'] = (string)(((int)$_SESSION['bid_amount'])*100);
if($_SESSION['place_daily_budget'] == 'adset_daily_budget')
    $post_data['bid_strategy'] = $_SESSION['bid_strategy'];
    
    
if(isset($_SESSION['datetime']))
    $post_data["start_time"] = strtotime($_SESSION['date'].':00+0300');



    
    
/* ТАРГЕТИНГ */
    
$targeting = array(
  'targeting_optimization' => "expansion_all"
); 
  
if($_SESSION['genders'] != '0')   
    $targeting['genders'] = [$_SESSION['genders']];
if($_SESSION['age_min'] != '')   
    $targeting['age_min'] = $_SESSION['age_min'];  
if($_SESSION['age_max'] != '')   
    $targeting['age_max'] = $_SESSION['age_max'];
    
    
/*детальный таргетинг*/
    
$geo_locations = array("countries" => $_SESSION['countries']);
/*добавить остальные массивы*/
  

  

if($_SESSION['location_types'] == "recent and home") 
    $_SESSION['location_types'] = array("home","recent");
else
    $_SESSION['location_types'] = array($_SESSION['location_types']);
$geo_locations['location_types'] = $_SESSION['location_types'];

    
    
$targeting['geo_locations'] = $geo_locations;



if(!isset($_SESSION['targeting_optimization'])) {
    if(isset($_SESSION['mobile']))
        $device_platforms[] = 'mobile';
    if(isset($_SESSION['desktop']))
        $device_platforms[] = 'desktop';  
        
    $targeting['device_platforms'] = $device_platforms;    
        
        
        
    if(isset($_SESSION['publisher_platforms_facebook']))
        $publisher_platforms[] = 'facebook';
    if(isset($_SESSION['publisher_platforms_audience_network']))
        $publisher_platforms[] = 'audience_network'; 
    
    if(isset($_SESSION['facebook_positions_feed']))
        $facebook_positions[] = 'feed';
    if(isset($_SESSION['facebook_positions_right_hand_column']))
        $facebook_positions[] = 'right_hand_column'; 
    if(isset($_SESSION['facebook_positions_instant_article']))
        $facebook_positions[] = 'instant_article';
    if(isset($_SESSION['facebook_positions_marketplace']))
        $facebook_positions[] = 'marketplace'; 
    if(isset($_SESSION['facebook_positions_video_feeds']))
        $facebook_positions[] = 'video_feeds'; 
    if(isset($_SESSION['facebook_positions_story']))
        $facebook_positions[] = 'story';
    if(isset($_SESSION['facebook_positions_search']))
        $facebook_positions[] = 'search'; 
    
    if(isset($_SESSION['audience_network_positions_classic']))
        $audience_network_positions[] = 'classic'; 
    if(isset($_SESSION['audience_network_positions_instream_video']))
        $audience_network_positions[] = 'instream_video'; 
    if(isset($_SESSION['audience_network_positions_rewarded_video']))
        $audience_network_positions[] = 'rewarded_video';
        
        
    if(isset($_SESSION['mobile'])) { 
        
        if(isset($_SESSION['publisher_platforms_instagram']))
            $publisher_platforms[] = 'instagram'; 
        if(isset($_SESSION['publisher_platforms_messenger']))
            $publisher_platforms[] = 'messenger';
        
        
        if(isset($_SESSION['instagram_positions_stream']))
            $instagram_positions[] = 'stream';
        if(isset($_SESSION['instagram_positions_story']))
            $instagram_positions[] = 'story'; 
        if(isset($_SESSION['instagram_positions_explore']))
            $instagram_positions[] = 'explore';
               
               
        if(isset($_SESSION['messenger_positions_messenger_home']))
            $messenger_positions[] = 'messenger_home'; 
            //*
        //if(isset($_SESSION['messenger_positions_sponsored_messages']))
           // $messenger_positions[] = 'sponsored_messages'; 
        if(isset($_SESSION['messenger_positions_story']))
            $messenger_positions[] = 'story';
    }
     
    
    if(isset($publisher_platforms))
        $targeting['publisher_platforms'] = $publisher_platforms;
        
    if(isset($facebook_positions))
        $targeting['facebook_positions'] = $facebook_positions;
    if(isset($instagram_positions))
        $targeting['instagram_positions'] = $instagram_positions;
    if(isset($audience_network_positions))
        $targeting['audience_network_positions'] = $audience_network_positions;
    if(isset($messenger_positions))
        $targeting['messenger_positions'] = $messenger_positions;
        
    
    if(isset($_SESSION['mobile'])) { 
        
        //Оба
        /*if(isset($_SESSION['IOS']) && isset($_SESSION['Android']))
            $user_os = ['IOS', 'Android'];
        else {*/
        if(!(isset($_SESSION['IOS']) && isset($_SESSION['Android']))){
        //Один из    
            if(isset($_SESSION['IOS'])) {
                if(($_SESSION['ios_version1'] == "2.0") && ($_SESSION['ios_version2'] == "9.0"))
                    $ios = "iOS";
                else 
                    $ios = "iOS_ver_".$_SESSION['ios_version1']."_to_".$_SESSION['ios_version2'];
                $user_os[] = $ios;
                
                if(!(isset($_SESSION['iPhone']) && isset($_SESSION['iPad']) && isset($_SESSION['iPod']))){
                    if(isset($_SESSION['iPhone']))
                        $user_device[] = 'iPhone';
                    if(isset($_SESSION['iPad']))
                        $user_device[] = 'iPad';
                    if(isset($_SESSION['iPod']))
                        $user_device[] = 'iPod';
                }
            }
            else {
                if(($_SESSION['android_version1'] == "2.0") && ($_SESSION['android_version2'] == "8.0"))
                    $android = "Android";
                else 
                    $android = "Android_ver_".$_SESSION['android_version1']."_to_".$_SESSION['android_version2'];
                $user_os[] = $android;
                
                if(!(isset($_SESSION['Android_Smartphone']) && isset($_SESSION['Android_Tablet']))){
                    if(isset($_SESSION['Android_Smartphone']))
                        $user_device[] = 'Android_Smartphone';
                    if(isset($_SESSION['Android_Tablet']))
                        $user_device[] = 'Android_Tablet';
                }
            }
            
        }
        
    }
    
    if(isset($user_os))
        $targeting['user_os'] = $user_os;
    if(isset($user_device))
        $targeting['user_device'] = $user_device;

}    
    
 
$post_data['targeting'] = json_encode($targeting);
    



include($_SERVER['DOCUMENT_ROOT']."/post.php");
if(is_null($output)) 
    include($_SERVER['DOCUMENT_ROOT']."/post.php");
            
            
$log = "ADSET ".date("H:i:m d:m:Y")."\n".json_encode($_SESSION)."\n".date("H:i:m d:m:Y", $row['reftime'])."\n".json_encode($firstoutput)."\n".json_encode($output)."\n\n\n";
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
    
    $_SESSION['adset_id'] = $output->id;
    $queryAdset = $link->query("INSERT INTO Adset_Id (name, adset_id, camp_id, access_token) VALUES ('".$_SESSION['adset_name']."', '".$output->id."', '".$_SESSION['campaign_id']."', '".$row['access_token']."')");
    
    $_SESSION['output'][$current_numb][3] = $output;
    header('Location: ad.php');
    exit();    
    
}







?>