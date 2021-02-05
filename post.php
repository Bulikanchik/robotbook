<?php
include("headers.php");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);

//curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2TLS);
//curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
//curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt');
if($user_agent)
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
if($proxy) {
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $login_password); 
}
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);


$output = json_decode(curl_exec($ch));
$curl_info = curl_getinfo($ch);
$curl_error = curl_error($ch);

$post_descr = curl_copy_handle($ch);

curl_close($ch);
?>