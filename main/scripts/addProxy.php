<?php

$flag = 1;
foreach(explode("\n", $_POST['proxys']) as $proxy){
    if(strpos(file_get_contents($_SERVER['DOCUMENT_ROOT']."/proxy.txt"), $proxy."\n") !== false){
        echo -2;
    }
    else {
        $ff = file_get_contents($_SERVER['DOCUMENT_ROOT']."/proxy.txt");
        if(!file_put_contents($_SERVER['DOCUMENT_ROOT']."/proxy.txt", $proxy."\n", FILE_APPEND)){
            echo -1;
            $flag = 0;
        }
    }
    
}

if($flag) {
    $handle = @fopen($_SERVER['DOCUMENT_ROOT']."/proxy.txt", "r");
    while($str = fgets($handle))
        $arr[] = $str;
        
    print_r(json_encode($arr));
}

$log = "ADD PROXY \n".json_encode($_POST)."\n".json_encode($ff)."\n".json_encode($arr)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);


exit();
?>
