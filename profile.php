<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profile</title>
    <!--css styling-->
       <style>
            table, td, th {
            border: 1px solid black;
            }

            table {
            border-collapse: collapse;
            width: 60%;
            height: 225px;
            display: block;
            overflow-y: scroll;
            }
            th{
    background-color: #B1308A;
    padding: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 0;
    width: 250px;
}
        </style>
</head>

<body>
<?php 
session_start();
if(!isset($_SESSION['auth'])){
    //echo "stop"; die();
    header('location:login.php');
}
include("includes/header.php");
include("dashboard-handler.php");


?>
    <div class="profile-outer">
        <div class="profile" id="profile">
            <div class="profile-left">
                <ion-icon name="person-circle-outline" class="profile-icon"></ion-icon>
                <div class="acc-username"><?php echo $_SESSION['auth']['fname'];?></div>
                <div class="acc-email"><?php echo $_SESSION['auth']['email'];?></div>
                <div class="acc-update">
                   <span onclick="fetchData()">
                        <ion-icon name="analytics-outline" class="acc-icon"></ion-icon>
                        <div class="dashboard acc">Dashboard</div>
                   </span>
                    <span onclick="password()">
                        <ion-icon name="key-outline" class="acc-icon"></ion-icon>
                        <div class="change-pass acc">Change Password</div>
                    </span>
                    <span>
                    <ion-icon name="log-out-outline" class="acc-icon"></ion-icon>
                        <a href="logout.php" style="color:black; text-decoration:none;"><div class="logout acc">Log Out</div></a>
                    </span>
                </div>
            </div>
            <div class="profile-right">
                <div class="pass-error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    ?>
                </div>
                <div class="donate-dashboard" id="donate-dashboard">
                    <!--html table defining-->
                <table  style="width:100%">
                        <tr>
                            <th>S.No</th>
                            <th>Donated Item(s)</th>
                            <th>Date of Donation</th>
                        </tr>
                        <?php
                            $donation = getDonation();
                            if(isset($donation)){
                              $i = 1;
                              foreach($donation as $key => $value){
                        ?>
                         <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                             <td>
                                <?php
                                    if(is_array(json_decode($value['item'])))
                                    {
                                        echo implode(", ",json_decode($value['item']));
                                    }
                                    else
                                    {
                                        echo  $value['item'];
                                    }
                                        
                                ?>
                             </td>
                             <td>
                                 <?php echo $value['lastUpdated'] ?>
                             </td>
                         </tr>
                        <?php
                                }
                            }
                        ?>
                </table>
                </div>
               
                <div class="volunteer-dashboard" id="volunteer-dashboard">
                <table style="width:100%">
                        <tr>
                            <th>S.No</th>
                            <th>Volunteered Task</th>
                            <th>Date of Volunteering</th>
                    </tr>
                    <?php
                            $volunteer = getVolunteers();
                            if(isset($volunteer)){
                              $i = 1;
                              foreach($volunteer as $key => $value){
                        ?>
                         <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                             <td>
                                <?php
                                    if(is_array(json_decode($value['task'])))
                                    {
                                        echo implode(", ",json_decode($value['task']));
                                    }
                                    else
                                    {
                                        echo  $value['task'];
                                    }
                                        
                                ?>
                             </td>
                             <td>
                                 <?php echo $value['created_at'] ?>
                             </td>
                         </tr>
                        <?php
                                }
                            }
                        ?>
                </table>
                </div>

                <div class="pass-board" id="pass-board">
                    <form id="pass-ch" action="profile_handler.php" method="POST"  >
                        <h2>Change password</h2>
                        <div><label class="pass-text">Old password</label></div>
                        <div><input type="password" class="ch-pass" name="oldpassword" id="acc-old-pass" required></div>
                        <div><label class="pass-text">New password</label> </div>
                        <div><input type="password" class="ch-pass" name="newpassword" id="acc-pass" required></div>
                        <div><label class="pass-text">Confirm new password</label></div>
                        <div><input type="password" class="ch-pass" name="cpassword" id="acc-cpass" required></div>
                        <input type="submit" Value="Update Password" name="changepassword" class="change-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/profile.js"></script>
</body>
</html>