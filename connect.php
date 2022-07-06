<?php

$servername = "localhost";
$username = "administrator";
$password = "MMAD";
$dbname = "MMAD";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connention Failed: " . mysqli_connect_error());
}