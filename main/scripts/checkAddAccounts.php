<?php
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';

//Дублирующие имена
$dubleNames = [];
for($i = 0; $i < count($_POST['info']); ++$i) {
    $query = $link->query("SELECT * FROM Tokenbase WHERE acc_name='".$_POST['info'][$i][0]."'");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if(count($row) != 0)
        $dubleNames[] = $i + 1;
}

//Дублирующие токены
$dubleAccs = [];
for($i = 0; $i < count($_POST['info']); ++$i) {
    $query = $link->query("SELECT * FROM Tokenbase WHERE access_token='".$_POST['info'][$i][1]."'");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if(count($row) != 0)
        $dubleAccs[] = $i + 1;
}

//Дублирующие имена в пришедшем массиве
$dubleNamesInput = [];

for($i = 0; $i < count($_POST['info']); ++$i)
    $numbers[] = $_POST['info'][$i][0];
    
$numbers = array_count_values($numbers);    

for($i = 0; $i < count($_POST['info']); ++$i) {
    if($numbers[$_POST['info'][$i][0]] != "1")
        $dubleNamesInput[] = $i + 1;
}

//Дублирующие токены в пришедшем массиве
$dubleAccsInput = [];

for($i = 0; $i < count($_POST['info']); ++$i)
    $accs[] = $_POST['info'][$i][1];
    
$accs = array_count_values($accs);    

for($i = 0; $i < count($_POST['info']); ++$i) {
    if($accs[$_POST['info'][$i][1]] != "1") 
        $dubleAccsInput[] = $i + 1;
}   
    
$out[] = $dubleNames;
$out[] = $dubleAccs;
$out[] = $dubleNamesInput;
$out[] = $dubleAccsInput;

print_r(json_encode($out));

exit();
?>