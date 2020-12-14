<?php

//sends user back to singup page if they accessed file throught the wrong method
if(isset($_POST["submit"])){
  $name=$_POST["name"];
  $email=$_POST["email"];
  $username=$_POST["uid"];
  $pwd=$_POST["pwd"];
  $repeatPwd=$_POST["repeatpwd"];

  //Error Handlers
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  //anything besides false=error
  if(emptyInputSignup($name,$email,$username,$pwd,$repeatPwd) !==false){
    header("location: ../signup.php?error=emptyinput"); //forgot to type something into signup form
    //stops script from running
    exit();
  }

  if(invalidUid($username) !==false){
    header("location: ../signup.php?error=invaliduid"); //invalid username
    //stops script from running
    exit();
  }
  if(invalidEmail($email) !==false){
    header("location: ../signup.php?error=invalidemail"); //invalid email
    //stops script from running
    exit();
  }
  if(pwdMatch($pwd, $repeatPwd) !==false){
    header("location: ../signup.php?error=invalidpassword"); //invalid password
    //stops script from running
    exit();
  }
  if(uidExists($conn, $username, $email) !==false){
    header("location: ../signup.php?error=usernametaken"); //username taken
    //stops script from running
    exit();
  }

  createUser($conn, $name, $email, $username, $pwd);

}

else{
  header("location: ../signup.php");
  exit();
}
