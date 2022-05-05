<?php
@session_start();
?>

<html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link rel="stylesheet" href="assets/css/style.css">
      <title>Helping Hands</title>
    </head>
    <body>
<!-------------------------------------------- navbar--------------------------------------------------------------->

    <header class="header">
        <nav class="navbar">
            <img src="assets/images/logo2.png" />
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="index.php#about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="index.php#help" class="nav-link">Help</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                
                
                <?php
                    if(isset($_SESSION['auth'])){
                ?>
                    <li class="nav-item">
                        <?php
                            if($_SESSION['auth']['role']=='admin'){
                        ?>
                            <a href="home-admin.php" class="nav-link">Dashboard</a>
                        <?php
                            }
                            else{
                        ?>
                        <a href="profile.php" class="nav-link">Profile</a>
                        <?php
                            }
                        ?>
                    </li>
                <!-- <li class="nav-item">
                    <a href="logout.php" class="nav-link">LogOut</a>
                </li> -->
                <?php
                    }
                    else{
                ?>
                    <li class="nav-item">
                    <a href="login.php" class="nav-link">LogIn/SignUp</a>
                </li>
                <?php
                    }
                ?>
                
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
                </body>
                </html>
               