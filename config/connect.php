<?php
ob_start();
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_library";

try{
    $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbcon->exec("set names utf8");
} catch(PDOException $e){
    echo $e->getmessage();
}
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

?>