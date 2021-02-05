<?php
$dir = $_SERVER['DOCUMENT_ROOT'].'/main/templates';
      
                            
$f = scandir($dir);
foreach ($f as $file)   
    foreach($_POST['names'] as $name)
        if($file == $name)
           unlink($_SERVER['DOCUMENT_ROOT'].'/main/templates/'.$file);


$ff = scandir($dir);
unset($ff[0],$ff[1]);
$files = [];
foreach ($ff as $ffile)   
    $files[] = $ffile;
    
print_r(json_encode($files));


$log = "DELETE TEMPLATE \n".json_encode($_POST)."\n".json_encode($f)."\n".json_encode($ff)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);


exit();
?>
