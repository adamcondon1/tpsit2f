<?php

if(isset($_POST["submit"])){

  $username=$_POST["uid"];
  $pwd=$_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  //error handler
  if(emptyInputLogin($username,$pwd) !==false){
    header("location: ../login.php?error=emptyinput"); //forgot to type something into signup form
    //stops script from running
    exit();
  }

  loginUser($conn, $username, $pwd);

}
else{
  header("location: ../login.php");
  exit();
}
