<?php

$i = 0;
foreach($_POST['info'] as $acc){
    
   if($acc[3] != '') {
        $proxy = explode("//", explode("@", $acc[3])[0])[1];
        $login_password = explode("@", $acc[3])[1];
        
        $url = "http://api.ipify.org/";
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $login_password); 
        
        
        $output = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);
        if(!$output)
            $errors[] = $i + 1;
        ++$i;
    }
}
print_r(json_encode($errors));
?>