<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Donation Form</title>
</head>

<body>
<?php include('includes/header.php')?>

<?php
@session_start();
if(!isset($_SESSION['auth'])){
    $_SESSION["error"] = "*You are not logged in!*";
    header('location:login.php');
}
?>
    <!--------------------------------------------donation form--------------------------------------------------------------->
    <div class="dform-container">
        <div class="dform-left"></div>

        <div class="dform-right">
            <form class="d-form" id="d-form" action="donations.php" method="POST">
                <h2>Donation Form</h2>

                <div class="tab"><label class="dtext" id="category">Select the item(s) you want to donate:</label>
                    <div class="category">
                        <div class="category-container">
                            <div class="cat Stationary">
                                <label><input type="checkbox" value="Stationary" name="item[]"><span>Stationary</span></label>
                            </div>
                            <div class="cat Toiletries">
                                <label><input type="checkbox" value="Toiletries" name="item[]"><span>Toiletries</span></label>
                            </div>
                            <div class="cat Clothing">
                                <label><input type="checkbox" value="Clothing" name="item[]"><span>Clothing</span></label>
                            </div>
                            <div class="cat Food">
                                <label><input type="checkbox" value="Food" name="item[]"><span>Food</span>
                                </label>
                            </div>
                            <div class="cat Others">
                                <label><input type="checkbox" value="Others" name="item[]"><span>Others</span></label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab address"><label class="dtext">Address:</label>
                    <p><input onkeydown="return /[a-z]/i.test(event.key)" placeholder="Name of your Hostel..." oninput="this.className = ''" name="hostel"></p>
                    <p><input type="number" placeholder="Your Room Number..." oninput="this.className = ''" name="room"></p>
                </div>

                <div class="tab contact"><label class="dtext">Contact info:</label>
                   
                    <p><input type="number" id="phone" placeholder="Phone(10 digit number)" oninput="this.className = ''" name="ph"></p>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="dnextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="validateCB()">Next</button>
                    </div>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>

    </div>
   <!-- <script src="assets/js/script.js"></script> -->
   
   <script src="assets/js/script.js"></script>
    <script src="assets/js/navbar.js"></script>
</body>


</html>