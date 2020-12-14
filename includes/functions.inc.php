<?php

  function emptyInputSignup($name,$email,$username,$pwd,$repeatPwd){
    $result;

    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($repeatPwd)){ //will check for empty data and return what is in if statment
      $result=true; //if mistake in fields, error is true
    }
    else {
      $result=false; //else everything is fine and error is false
    }
    return $result;
  }

  function invalidUid($username){
    $result;

    if(!preg_match("/^[a-zA-Z0-100]*$/", $username)){ //will approve username as long as it follows these parameters
      $result=true;
    }
    else {
      $result=false;
    }
    return $result;
  }

  function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //'FILTER_VALIDATE_EMAIL' is a built in php function that will validate if an email is real/true
      $result=true;
    }
    else {
      $result=false;
    }
    return $result;
  }

  function pwdMatch($pwd, $repeatPwd){
    $result;

    if($pwd !== $repeatPwd){ //checks if both passwords do not match
      $result=true;
    }
    else {
      $result=false;
    }
    return $result;
  }

  function uidExists($conn, $username, $email){
    $sql="SELECT * FROM users WHERE usersUid=? OR usersEmail=?;";
    $stmt=mysqli_stmt_init($conn); //Prepared statement that secures signup page database, stops code from being injected into database

    if(!mysqli_stmt_prepare($stmt, $sql)){ //checks for mistakes in sql statement
      header("location: ../signup.php?error=stmtfailed"); //statement failed
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email); //Pass in data from user if prepared statement doesnt fail
                                                            //"ss" stands for two strings, if there were 3 pieces of data it would be "sss" and you would also add a third variable
    mysqli_stmt_execute($stmt); //executes statement

     $resultData=mysqli_stmt_get_result($stmt); //get results
     if($row=mysqli_fetch_assoc($resultData)){ //fetch data as an associative array (columns set to their names), also if there is data inside the database with this username, it will grab that data
       return $row; //returns all data from database if user already exists in database, used for login form as well
     }
     else{
       $result=false;
       return $result;
     }

     mysqli_stmt_close($stmt);
  }

  function createUser($conn, $name, $email, $username, $pwd){
    $sql="INSERT INTO users(usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){ //checks for mistakes in sql statement
      header("location: ../signup.php?error=stmtfailed"); //statement failed
      exit();
    }

     $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT); //hashes password to protect the password from malicous users

     mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username,  $hashedPwd); //Pass in data from user if prepared statement doesnt fail

     mysqli_stmt_execute($stmt); //executes statement

     mysqli_stmt_close($stmt);

     header("location: ../signup.php?error=none"); //sends user to location page after successful signup
     exit();
  }

  function emptyInputLogin($username,$pwd){
    $result;

    if(empty($username) || empty($pwd)){ //will check for empty data and return what is in if statment
      $result=true; //if mistake in fields, error is true
    }
    else {
      $result=false; //else everything is fine and error is false
    }
    return $result;
  }

  function loginUser($conn, $username, $pwd){
    $uidExists=uidExists($conn, $username, $username); //checking if data exists in database for login
                                                       //email counts as username now because only username or email need to be true due to the uidExists function
    if($uidExists===false){ //error handler for login details
      header("location: ../login.php?error=wronglogin");
      exit();
    }

    $hashedPwd=$uidExists["usersPwd"];
    $checkPwd=password_verify($pwd, $hashedPwd); //verifies password by matching entered password with hashed password in databases

    //password verification error handler
    if($checkPwd===false){
      header("location: ../login.php?error=wronglogin");
      exit();
    }
    else if($checkPwd===true){ //locks user onto website (session)
      session_start(); //starts Yaf_Session
      $_SESSION["userid"]=$uidExists["usersId"]; //super global session variable
      $_SESSION["useruid"]=$uidExists["usersUid"]; //both variables grab the users id and username
      header("location: ../index.php");
      exit();
    }
  }
