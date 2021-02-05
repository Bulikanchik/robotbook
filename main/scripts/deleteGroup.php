<?php

$file = file($_SERVER['DOCUMENT_ROOT']."/groups.txt"); 


for($i = 0; $i < count($file); ++$i)
    foreach($_POST['names'] as $name)
        if($file[$i] == $name)
            $ind[] = $i;


for($i = 0; $i < count($ind); ++$i)
    unset($file[$ind[$i]]);
    
    

$fp = fopen($_SERVER['DOCUMENT_ROOT']."/groups.txt", "w"); 
fputs($fp, implode("", $file));
$handle = @fopen($_SERVER['DOCUMENT_ROOT']."/groups.txt", "r");
$arr = [];
while($str = fgets($handle))
    $arr[] = $str;
    
//print_r(file_get_contents($_SERVER['DOCUMENT_ROOT']."/groups.txt") == "");
print_r(json_encode($arr));
fclose($fp);


$log = "DELETE GROUP \n".json_encode($_POST)."\n".json_encode($file)."\n".json_encode($arr)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);


exit();
?>
