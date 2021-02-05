<?php
if($user_agent) 
    $headers = array(
        "User-Agent: ".$user_agent,
        "Accept: */*",
        "Authorization: OAuth ".$access_token,
        "X-Fb-Connection-Type: wifi",
        "Host: graph.facebook.com",
        "Accept-Encoding: gzip, deflate",
        "Accept-Language: ru,en;q=0.9",
        "Referer: https://graph.facebook.com/",
        "Connection: keep-alive"
        
        //"Host: alaskamy.online",
        //"Host: graph.facebook.com",
        //"accept: application/json",
        //"cache-control: no-cache",
        //"content-type: application/x-www-form-urlencoded"
    );
else
    $headers = array(
        "Authorization: OAuth ".$access_token,
        "Host: graph.facebook.com",
        "Referer: https://graph.facebook.com/"
    );
?>