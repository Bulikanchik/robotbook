<?php
include $_SERVER['DOCUMENT_ROOT'].'/connects.php';


foreach($_POST['numbers'] as $value) {
    $query = $link->query("SELECT * FROM Tokenbase WHERE number='".$value."'");
    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    
    $query= $link->query("DELETE FROM Tokenbase WHERE access_token='".$row['access_token']."'");
    $queryRk = $link->query("DELETE FROM Rk_Id WHERE access_token='".$row['access_token']."'");
    $queryCamp = $link->query("DELETE FROM Camp_Id WHERE access_token='".$row['access_token']."'");
    $queryAdset = $link->query("DELETE FROM Adset_Id WHERE access_token='".$row['access_token']."'");
    $queryAd = $link->query("DELETE FROM Ad_Id WHERE access_token='".$row['access_token']."'");
    $queryFp = $link->query("DELETE FROM Fp_Id WHERE access_token='".$row['access_token']."'");
}

$log = "DELETE ACCOUNTS \n".json_encode($_POST)."\n".$query."\n".$queryRk."\n".$queryCamp."\n".$queryAdset."\n".$queryAd."\n".$queryFp."\n\n\n";
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs.txt", $log, FILE_APPEND);


exit();

?>
