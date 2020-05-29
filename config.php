<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
//setup database

$host = "localhost";
$user = "root";
$pass = "";
$dbName = "pun20";

$sambung = mysqli_connect($host,$user,$pass ,$dbName);

if (!$sambung) {
    die('Sambungan eror (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}



$tapelkd = "7fd69a26245ab95088bcfcccc6cc559e";


//kelas
$akelas=array("TSP. A","TSP. B","TGB. A","TGB. B","TKBB","TITL A","TITL B","TITL C","TITL D","TAV A","TAV B","TEI A","TEI B","TLAS","TP A","TP B","TP C","TKR A","TKR B","TAB A","TAB B","TSM A","TSM B","TKJ A","TKJ B","TKJ C");

?>