<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Volunteer Form</title>
</head> 

<body>

    <?php include('includes/header.php')?>
    <?php
        @session_start();
        if(!isset($_SESSION['auth'])){
            //echo "stop"; die();
            $_SESSION["error"] = "*You are not logged in!*";
           header('location:login.php');
           
            }?>

    <!--------------------------------------------volunteer form--------------------------------------------------------------->
    <div class="vform-container">
        <div class="vform-left"></div>

        <div class="vform-right">
            <form class="v-form" id="v-form" action="volunteers.php" method="POST">
                <h2>Volunteer Form</h2>

                <div class="tab"><label class="vtext">Choose Task:</label>
                    <p><select class="options" name="task"></p>
                        <option class="option" value="0" oninput="this.className = ''" name="task">--Choose a Task to Volunteer--</option>
                        <option class="option" value="Teaching" oninput="this.className = ''" name="task">Teach the local village kids</option>
                        <option class="option" value="Distribution of Goods" oninput="this.className = ''" name="task">Help in distributing the donated goods</option>
                        <option class="option" value="CleanVillage" oninput="this.className = ''" name="task">Help in cleaning the village area</option>
                        <option class="option" value="CleanCampus" oninput="this.className = ''" name="task">Help in cleaning the campus</option>
                        <option class="option" value="Conduct Events" oninput="this.className = ''" name="task">Conduct various events for the village people</option>
                    </select>
                        <label class="vtext" >Choose Date:</label>
                        <p><input type="date" oninput="this.className = ''" name="vdate" min="<?php echo date("Y-m-d"); ?>" ></p>
                </div>

                <div class="tab address"><label class="vtext">Address:</label>
                    <p><input onkeydown="return /[a-z]/i.test(event.key)" placeholder="Name of your Hostel..." oninput="this.className = ''" name="hostel"></p>
                    <p><input type="number" placeholder="Your Room Number..." oninput="this.className = ''" name="room"></p>
                  </div>

                <div class="tab contact"><label class="vtext">Contact info:</label>
                    <p><input placeholder="Phone(10 digit number)" oninput="this.className = ''" name="phone" type="number" id="phone"></p>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="vnextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="vnextPrev(1)">Next</button>
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
    

    <script>
       <?php
         require_once("assets/js/script.js");
         ?>
   </script>

    <script src="assets/js/navbar.js">
        
    // require_once("../assets/js/navbar.js");
    
    </script>
</body>


</html>