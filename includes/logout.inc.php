<?php

//website checks to see if there are session variables inside the session to know if user is logged in

session_start();
session_unset();
session_destroy(); //logs out user/terminating session

header("location: ../index.php"); //goes into header and brings user back to main page
exit();
