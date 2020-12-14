<?php
  include_once 'header.php'; //linking to header.php
?>

<body>
<body style='background-color:lightblue'>

<section class="signup-form">

  <div class="wrapper">
    <div class="accountText">

      <h1>Create an Account</h1>

    <div class="w4">
  <form class="form" action="includes/signup.inc.php" method="post">

    <input class="i" type="text" name="name" placeholder="Full name">
    <input class="i" type="text" name="email" placeholder="Email">
    <input class="i" type="text" name="uid" placeholder="Username">
    <input class="i" type="password" name="pwd" placeholder="Password">
    <input class="i" type="password" name="repeatpwd" placeholder="Repeat password">
    <button id="btn1" type="submit" name="submit"><h4>Sign Up<h4></button>
  </form>
    </div>
  </div>
</div>
  <?php
  //error messages (could possibly use JavaScript here instead)
    if(isset($_GET["error"])){
      if($_GET["error"]=="emptyinput"){
        echo "<h5>Fill in all fields!</h5>";
      }
      elseif ($_GET["error"] == "invaliduid") {
        echo "<h5>Choose a proper username!</h5>";
      }
      elseif ($_GET["error"] == "invalidemail") {
        echo "<h5>Use a valid email!</h5>";
      }
      elseif ($_GET["error"] == "invalidpassword") {
        echo "<h5>Passwords dont match!</h5>";
      }
      elseif ($_GET["error"] == "usernametaken") {
        echo "<h5>Username is already taken!</h5>";
      }
      elseif ($_GET["error"] == "stmtfailed") {
        echo "<h5>Something went wrong, please try again :(</h5>";
      }
      elseif ($_GET["error"] == "none") {
        echo "<h5>You are signed up!</h5>";
      }
    }

   ?>

</section>
</body>

<?php
  include_once 'footer.php'; //linking to footer.php
?>
