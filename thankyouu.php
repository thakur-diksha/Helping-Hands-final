<?php 
session_start();
if(!isset($_SESSION['auth'])){
    //echo "stop"; die();
    header('location:login.php');
}
include("includes/header.php");

?>


<body>
    <!-- -----------------------------------login page-------------------------------------- -->
    <div class="login-page" id="login-page">
    <h1 style="color:#ffffff;"> THANK YOU  <p><?php echo $_SESSION['auth']['fname']?>!</p>  FOR VOLUNTEERING! <p>&#128519;</p></h1>     
      <!--  <p><?php //echo $_SESSION['auth']['fname']?>!</p> -->
    </div>

    <script>
        <?php require_once("assets/js/script.js");?>
    </script>
    
</body>

