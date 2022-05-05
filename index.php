<?php include('includes/header.php')?>

<!---------------------------------------------Home page------------------------------------------------------------->
<div class="home" id="home">
  <div class="homeBox" id="homeBox">
      <div class="hb">
          <span>
              <p class="head1">Every contribution you make</p>
              <p class="head2">has a bigger impact than you think</p>
          </span>

          <div class="homebtn">
            <button class="btn" onclick="location.href='donation_form.php' ">
              <span class="btntext">Donate</span>
              <i class="fa fa-heartbeat" aria-hidden="true"></i>
            </button>
            <button class="btn" onclick="location.href='volunteer_form.php' ">
              <span class="btntext">Volunteer</span>
              <ion-icon name="hand-right"></ion-icon>
            </button>
          </div>
      </div>
  </div>
</div>

<!--------------------------------------------about us------------------------------------------------------------->
<div class="about">
  <div class="about-heading"><h1>Our Mission</h1> <div class="dash"></div> </div>
  <div class="about-container" id="about">

      <div class="info1">
          <h1>Donating</h1>
          <p class="text1">
              Our main goal is managing and salvaging post-consumer products. We
              can estimate a huge amount of un-used items which are either
              discarded by the students or kept un-used for a long time. Donate
              the items that you no longer need. The products can be used by the
              local village residents. We make the process of donation and
              collection of stuff easier.<br />
              We make donating convenient for you.<br /> <br />
              Donate for a better world.
          </p>
      </div>
      <div class="info2">
          <h1>Volunteering</h1>
          <p class="text2">
              We also provide you with the option to volunteer for any task of
              your choice. You can pick the date for volunteering as per your
              convenience. You can volunteer to teach the local children, or
              help distribute the donatable products. Extend a hand and help
              someone, in need, today. Be a force of change, make a difference.
              We believe you can change lives. Help us bring a change in the way
              we see things.<br /> <br />
              Join our volunteering team.
          </p>
      </div>
  </div>
</div>

<!---------------------------------------------------------image page ------------------------------------------------------>

<div class="imgpg"></div>
      
<!---------------------------------------------------------how we work------------------------------------------------------------->
<div id="how-we-work">
    <div class="how-we-work">
        <h1>How We Work</h1>
        <div class="dash1"> </div>
    </div>
    <div class="boxes">
        <div class="box box1">
            <div class="img"> <img src="assets/images/img1.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">Make a donation</h2>
                <p class="black">Specify the items you want to donate, as per your choice.</p>
            </div>
        </div>
        <div class="box box2">
            <div class="img"> <img src="assets/images/img2.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">Pickup from your location</h2>
                <p class="black">We come to pickup the specified items from your particular location.</p>
            </div>
        </div>
        <div class="box box3">
            <div class="img"> <img src="assets/images/img3.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">Donate to the needy</h2>
                <p class="black">We collect these items and we donate them to the local village residents.</p>
            </div>
        </div>
        <div class="box box4">
            <div class="img"> <img src="assets/images/img4.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">Schedule a Task</h2>
                <p class="black">Choose a task to volunteer for, on a date of your choice.</p>
            </div>
        </div>
        <div class="box box5">
            <div class="img"> <img src="assets/images/img5.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">We contact you</h2>
                <p class="black"> We choose the volunteers, and we contact you for <br>the particular task.</p>
            </div>
        </div>
        <div class="box box6">
            <div class="img"> <img src="assets/images/img6.png" width="170px" height="170px" />
            </div>
            <div class="t1">
                <h2 class="purple">You volunteer</h2>
                <p class="black">The chosen volunteers perform the tasks they volunteered for.</p>
            </div>
        </div>
    </div>
</div>


      <!----------------------------------------------------HELP PAGE----------------------------------------->
      <div class="help-section" id="help">
        <div class="inner-container">
          <h1>New to our Website ?</h1>
          <p class="text">
            Here is how you can make a change. Choose to either donate or
            volunteer. Donate re-usable stuff like stationary, clothing, food,
            toiletries etc. Or simply volunteer for tasks like teaching the
            local kids or helping distribute the donatable goods. <br />
            Your simple efforts can brighten someone's day. <br />Spread the
            cheer!
          </p>
          <div class="end">
            
            <span> 
              For more queries
              <a href="contact.php">contact us</a>
            </span> 
          </div>
        </div>
      </div>
      <!---------------------------------------what to donate page------------------------------------------------->
      <div class="what-to-donate" id="what-to-donate"></div>

      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
     
      <script> 
        <?php require_once("assets/js/navbar.js") ?>
    </script>
    </body>
<?php include('includes/footer.php')?>