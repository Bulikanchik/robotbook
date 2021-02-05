<?php
session_start();
session_unset();
//print_r($_POST);
if(isset($_FILES['creo'])) 
    if(explode('/', $_FILES['creo']['type'])[0] == 'video' || explode('/', $_FILES['creo']['type'])[0] == 'image'){
        $name = uniqid();
        $destiation_dir =  $_SERVER['DOCUMENT_ROOT'].'/main/scripts/createAd/creo/'.$name.'.'.explode('/', $_FILES['creo']['type'])[1];
        move_uploaded_file($_FILES['creo']['tmp_name'], $destiation_dir); 
        $_SESSION['creos'] = $name;
        $_SESSION['creo_type'] = explode('/', $_FILES['creo']['type'])[1];
    }   



if(isset($_FILES['preview'])) {
    if(isset($_FILES['preview'])) 
        if(explode('/', $_FILES['preview']['type'])[0] == 'image') {
            $name = uniqid();
            $destiation_dir = $_SERVER['DOCUMENT_ROOT'].'/main/scripts/createAd/preview/'.$name.'.'.explode('/', $_FILES['preview']['type'])[1];
            move_uploaded_file($_FILES['preview']['tmp_name'], $destiation_dir); 
            $_SESSION['previews'] = $name;
            $_SESSION['preview_type'] = explode('/', $_FILES['preview']['type'])[1];
        }
}


$_SESSION['uploadingfiles'] = $_FILES;




$_SESSION['place_daily_budget'] = $_POST['place_daily_budget'];
$_SESSION['daily_budget'] = $_POST['daily_budget'];
$_SESSION['campaign_status'] = $_POST['campaign_status'];
$_SESSION['adset_status'] = $_POST['adset_status'];
$_SESSION['ad_status'] = $_POST['ad_status'];
$_SESSION['bid_strategy'] = $_POST['bid_strategy'];
$_SESSION['bid_amount'] = $_POST['bid_amount'];
$_SESSION['objective'] = $_POST['objective'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['desktop'] = $_POST['desktop'];
$_SESSION['publisher_platforms_facebook'] = $_POST['publisher_platforms_facebook'];
$_SESSION['facebook_positions_feed'] = $_POST['facebook_positions_feed'];
$_SESSION['facebook_positions_right_hand_column'] = $_POST['facebook_positions_right_hand_column'];
$_SESSION['facebook_positions_instant_article'] = $_POST['facebook_positions_instant_article'];
$_SESSION['facebook_positions_marketplace'] = $_POST['facebook_positions_marketplace'];
$_SESSION['facebook_positions_video_feeds'] = $_POST['facebook_positions_video_feeds'];
$_SESSION['facebook_positions_story'] = $_POST['facebook_positions_story'];
$_SESSION['facebook_positions_search'] = $_POST['facebook_positions_search'];
$_SESSION['publisher_platforms_instagram'] = $_POST['publisher_platforms_instagram'];
$_SESSION['instagram_positions_stream'] = $_POST['instagram_positions_stream'];
$_SESSION['instagram_positions_story'] = $_POST['instagram_positions_story'];
$_SESSION['instagram_positions_explore'] = $_POST['instagram_positions_explore'];
$_SESSION['publisher_platforms_audience_network'] = $_POST['publisher_platforms_audience_network'];
$_SESSION['audience_network_positions_classic'] = $_POST['audience_network_positions_classic'];
$_SESSION['audience_network_positions_instream_video'] = $_POST['audience_network_positions_instream_video'];
$_SESSION['audience_network_positions_rewarded_video'] = $_POST['audience_network_positions_rewarded_video'];
$_SESSION['publisher_platforms_messenger'] = $_POST['publisher_platforms_messenger'];
$_SESSION['messenger_positions_messenger_home'] = $_POST['messenger_positions_messenger_home'];
$_SESSION['messenger_positions_story'] = $_POST['messenger_positions_story'];
$_SESSION['genders'] = $_POST['genders'];

$_SESSION['countries'] = $_POST['countries'];
$_SESSION['is_preview'] = $_POST['is_preview'];

$_SESSION['call_to_action'] = $_POST['call_to_action'];
$_SESSION['is_pixel'] = $_POST['is_pixel'];
$_SESSION['pixel_name'] = $_POST['pixel_name'];
$_SESSION['url'] = $_POST['url'];
$_SESSION['datetime'] = $_POST['datetime'];
$_SESSION['date'] = $_POST['date'];

$_SESSION['attribution_spec'] = $_POST['attribution_spec'];

$_SESSION['targeting_optimization'] = $_POST['targeting_optimization'];
$_SESSION['location_types'] = $_POST['location_types'];

$_SESSION['IOS'] = $_POST['IOS'];
$_SESSION['iPhone'] = $_POST['iPhone'];
$_SESSION['iPad'] = $_POST['iPad'];
$_SESSION['iPod'] = $_POST['iPod'];
$_SESSION['ios_version1'] = $_POST['ios_version1'];
$_SESSION['ios_version2'] = $_POST['ios_version2'];
$_SESSION['Android'] = $_POST['Android'];
$_SESSION['Android_Smartphone'] = $_POST['Android_Smartphone'];
$_SESSION['Android_Tablet'] = $_POST['Android_Tablet'];
$_SESSION['android_version1'] = $_POST['android_version1'];
$_SESSION['android_version2'] = $_POST['android_version2'];



$_SESSION['currentAcc'] = $_POST['currentAcc'];
$_SESSION['numbers'] = explode(",", $_POST['numbers']);
$_SESSION['first'] = '1';

foreach($_SESSION as $key => $value)
    if($value == '')
        unset($_SESSION[$key]);
        
$_SESSION['camp_name'] = $_POST['camp_name'];
$_SESSION['adset_name'] = $_POST['adset_name'];
$_SESSION['ad_name'] = $_POST['ad_name'];
$_SESSION['age_min'] = $_POST['age_min'];
$_SESSION['age_max'] = $_POST['age_max'];
$_SESSION['duble'] = $_POST['duble'];
$_SESSION['message'] = $_POST['message'];
$_SESSION['title'] = $_POST['title'];
$_SESSION['description'] = $_POST['description'];

header('Location: uploadFile.php');

exit();     
?>