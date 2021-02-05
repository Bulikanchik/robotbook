<?php 
$name = $_POST['template'];
unset($_POST['template']);


file_put_contents('../templates/'.$name.'.json',json_encode($_POST));


$dir = '../templates';
                                         
$f = scandir($dir);
print_r(json_encode($f));


$log = "ADD TEMPLATE \n".json_encode($_POST)."\n".json_encode($f)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);

exit();
?>