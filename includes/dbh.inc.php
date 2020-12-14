<?php
/*
//Localhost Development Connection
$serverName= "localhost";
$dbUsername= "root";
$dBPassword= "";
$dBName= "sit2fit";
$charset = 'utf8mb4';
*/

//mySQL Server Connection
$serverName= "eu-cdbr-west-03.cleardb.net";
$dbUsername= "bee934619bab05";
$dBPassword= "f91a6f09";
$dBName= "heroku_564f11b46a8491d";
$charset = 'utf8mb4';


//connection to databases
$link = mysqli_init();
$conn= mysqli_connect($serverName, $dbUsername, $dBPassword, $dBName);

//Error message if connection fails
if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

?>