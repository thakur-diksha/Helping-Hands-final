<?php
    function Donation(){
        $user_id = $_SESSION['auth']['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
            die("Connection Failed:" . mysqli_connect_error());
        $db= $conn;
        $query = "SELECT signup.fname,signup.lname,signup.email,donators.item,donators.hostel,donators.room,donators.ph,donators.lastUpdated FROM signup INNER JOIN donators ON signup.user_id = donators.user_id ORDER BY donators.lastUpdated DESC";
        $result = $db->query($query);
        $parsedData = $result->fetch_all(MYSQLI_ASSOC);
        return $parsedData;
    }

    function Volunteers(){
        $user_id = $_SESSION['auth']['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
            die("Connection Failed:" . mysqli_connect_error());
        $db= $conn;
        $query = "SELECT signup.fname,signup.lname,signup.email,volunteers.task,volunteers.vdate,volunteers.hostel,volunteers.room,volunteers.phone FROM signup INNER JOIN volunteers ON signup.user_id = volunteers.user_id  ORDER BY vdate DESC";
        $result = $db->query($query);
        $parsedData = $result->fetch_all(MYSQLI_ASSOC);
        return $parsedData;
    }
  ?>
