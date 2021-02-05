<?php
if(strpos(file_get_contents($_SERVER['DOCUMENT_ROOT']."/groups.txt"), $_POST['name']."\n") !== false)
    echo -2;
else {
    $ff = file_get_contents($_SERVER['DOCUMENT_ROOT']."/groups.txt");
    if(file_put_contents($_SERVER['DOCUMENT_ROOT']."/groups.txt", $_POST['name']."\n", FILE_APPEND)) {
        
        $handle = @fopen($_SERVER['DOCUMENT_ROOT']."/groups.txt", "r");
        while($str = fgets($handle))
            $arr[] = $str;
            
        print_r(json_encode($arr));
    }
    else
        echo -1;
}

$log = "ADD GROUP \n".json_encode($_POST)."\n".json_encode($ff)."\n".json_encode($arr)."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);

exit();

?>
