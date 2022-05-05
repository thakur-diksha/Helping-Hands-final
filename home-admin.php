<?php 
session_start(); 
include('admin-handler.php');
// echo "<pre>";
// print_r(Donation());
?>

<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helping Hands</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9a416a1cca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
            table, td, th {
            border: 1px solid black;
            }
            table {
            border-collapse: collapse;
            width: 50%;
            height: 540px;
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

    <div class="home-admin" id="admin-home">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-solid fa-angle-right" id="btn"></i>
            <i class="fas fa-solid fa-angle-left" id="cancel"></i>
        </label>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="index.php">
                        <ion-icon name="home" class="admin-icon"></ion-icon>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="fetchVData()">
                        <ion-icon name="hand-right" class="admin-icon"></ion-icon>
                        <span>Volunteers</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="fetchDData()">
                        <i class="fa fa-heartbeat" aria-hidden="true" class="admin-icon"></i>
                        <span>Donors</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="adPassword()">
                        <ion-icon name="key" class="admin-icon"></ion-icon>
                        <span>Change password</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <ion-icon name="log-out" class="admin-icon"></ion-icon>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content">
            <div class="admin-info" id="admin-info">
                <h2 class="wel-ad">Welcome Admin!</h2>
                <div class="ad-info">
                    <p>Name: Ajay Thakur</p>
                    <p>Role: Admin</p>
                    <p>Email Id: admin@banasthali.in</p>
                    <p>Phone: +91 9812901290</p>
                    <p>Department: NSS Office, Banasthali University</p>
                </div>
            </div>

            <div class="ad-pass-board" id="ad-pass-board">
                <!-- <form id="ad-pass-ch" onsubmit="valChangePass()">
                    <h2>Change password</h2>
                    <div><label class="pass-text">Old password</label></div>
                    <div><input type="password" class="ch-pass" id="acc-old-pass" required></div>
                    <div><label class="pass-text">New password</label> </div>
                    <div><input type="password" class="ch-pass" id="acc-pass" required></div>
                    <div><label class="pass-text">Confirm new password</label></div>
                    <div><input type="password" class="ch-pass" id="acc-cpass" required></div>
                    <input type="submit" Value="Update Password" class="change-btn">
                </form> -->
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

            <div class="ad-donor-data" id="ad-donor-data">
                        <table  style="width:100%">
                        <tr>
                            <th>S.No</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>DonatedItem</th>
                            <th>Hostel</th>
                            <th>Room</th>
                            <th>Phone</th>
                        </tr>
                        <?php
                            $donation = Donation();
                            if(isset($donation)){
                              $i = 1;
                              foreach($donation as $key => $value){
                        ?>
                         <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo  $value['fname']; ?>
                            </td>
                            <td>
                               <?php echo  $value['lname']; ?>
                            </td>
                            <td>
                            <?php echo  $value['email']; ?>
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
                             <?php echo  $value['hostel']; ?>
                            </td>
                            <td>
                            <?php echo  $value['room']; ?>
                            </td>
                            <td>
                            <?php echo  $value['ph']; ?>
                            </td>
                         </tr>
                        <?php
                                }
                            }
                        ?>
                        
        </table>
            </div>
            <div class="ad-volunteer-data" id="ad-volunteer-data">
            <table  style="width:100%">
                        <tr>
                            <th>S.No</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>VolunteeringTask</th>
                            <th>VolunteeringDate</th>
                            <th>Hostel</th>
                            <th>Room</th>
                            <th>Phone</th>
                        </tr>
                        <?php
                            $volunteer = Volunteers();
                            if(isset($volunteer)){
                              $i = 1;
                              foreach($volunteer as $key => $value){
                        ?>
                         <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo  $value['fname']; ?>
                            </td>
                            <td>
                               <?php echo  $value['lname']; ?>
                            </td>
                            <td>
                            <?php echo  $value['email']; ?>
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
                             <?php echo  $value['vdate']; ?>
                            </td>
                            <td>
                            <?php echo  $value['hostel']; ?>
                            </td>
                            <td>
                            <?php echo  $value['room']; ?>
                            </td>
                            <td>
                            <?php echo  $value['phone']; ?>
                            </td>
                         </tr>
                        <?php
                                }
                            }
                        ?>
        </table>
            </div>
            
        </div>
    </div>
</body>

<script src="assets/js/home-admin.js"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>