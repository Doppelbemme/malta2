<?php
$host = "localhost";
$name = "malta2";
$user = "malta";
$password = "Z)JfZy4976PvesgE";

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $password);
} catch (PDOException $exc){
    echo "SQL Error: ".$exc->getMessage();
}