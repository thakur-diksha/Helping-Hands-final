<?php
    function getDonation(){
        $user_id = $_SESSION['auth']['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
            die("Connection Failed:" . mysqli_connect_error());
        $db= $conn;
        $query = "SELECT item,lastUpdated FROM donators WHERE  user_id=$user_id ORDER BY lastUpdated DESC";
        $result = $db->query($query);
        $parsedData = $result->fetch_all(MYSQLI_ASSOC);
        return $parsedData;
    }

    function getVolunteers(){
        $user_id = $_SESSION['auth']['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
            die("Connection Failed:" . mysqli_connect_error());
        $db= $conn;
        $query = "SELECT task,created_at FROM volunteers WHERE user_id=$user_id ORDER BY created_at DESC";
        $result = $db->query($query);
        $parsedData = $result->fetch_all(MYSQLI_ASSOC);
        return $parsedData;
    }
  ?>
