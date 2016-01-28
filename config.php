<?php

$dbname="webpeg";
$dbuser="root";
$dbpass="";
$dbhost="localhost";


try{
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $dbuser, $dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo "Koneksi Error";
    echo $ex->getMessage();
    
}




 