<?php 
session_start(); 
include("includes/header.php"); 
?>

<html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--check this-->    <link rel="stylesheet" href="assets/css/style.css">
      <title>Helping Hands</title>
    </head>
    <body>

    <!-- -----------------------------------login page-------------------------------------- -->
    <div class="login-page" id="login-page">
        <div class="head">
            <div class="head1">
                <button onclick="loginform()">LOGIN</button>
                <div class="head-line" id="login-line"></div>
            </div>
            <div class="head2">
                <button onclick="signupform()">SIGNUP</button>
                <div class="head-line" id="signup-line"></div>
            </div>
        </div>

        <div class="error-msg">
         <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?> 
        </div>

        <div id="login-box">
            <form action="login-handler.php" name="login-form" id="login" method="POST" onsubmit="validateLogin()">
                <div class="label">
                    <label for="email">Email:</label>
                </div>
                <div class="input">
                    <input type="email" id="email" name="email" value="" placeholder="e.g.-btbti19037_diksha@banasthali.in" required>
                    <!-- <span id="invalid" style="color:red;"></span> -->
                </div>
                <div class="label">
                    <label for="password">Password:</label>
                </div>
                <div class="input">
                    <input type="password" id="password" name="password" value="" placeholder="6-9 characters long..." required>
                </div>
                <div>
                    <input class="submit" name="submit" type="submit" value="Log In">
                </div>
            </form>
        </div>
            <!-- <span style="color:#ffffff; font-size:22px;">
            
            </span> -->
        <div id="signup-box">
            
            <form action="signup-handler.php" name="signup-form" id="signup" method="POST" onsubmit="validateSignup()">
                <div class="label">
                    <label for="fname">Firstname:</label>
                </div>
                <div class="input">
                    <input onkeydown="return /[a-z]/i.test(event.key)" id="fname" name="fname" placeholder="Your First Name..." required>
                </div>
                <div class="label">
                    <label for="lname">Lastname:</label>
                </div>
                <div class="input">
                    <input onkeydown="return /[a-z]/i.test(event.key)" id="lname" name="lname" placeholder="Your Last Name..." required>
                </div>
                <div class="label">
                    <label for="email">Email:</label>
                </div>
                <div class="input">
                    <input type="email" id="mail" name="email" value="" placeholder="e.g.-btbti19037_diksha@banasthali.in" required>
                </div>
                <div class="label">
                    <label for="password">Password:</label>
                </div>
                <div class="input">
                    <input type="password" id="pass" name="password" value="" placeholder="6-9 characters long..." required>
                </div>
                <div>
                    <input class="submit" name = "submit" type="submit" value="Sign Up">
                </div>
            </form>
        </div>
    </div>

    <script>
        <?php require_once("assets/js/script.js");?>
    </script>
     <script src="assets/js/navbar.js"></script>
    
</body>
</html>