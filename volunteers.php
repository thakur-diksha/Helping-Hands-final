<?php
session_start();
if(!isset($_SESSION['auth'])){
    header('location:login.php');
}
else{
    if(empty($_POST)) die("Invalid request!");
}

    create_volunteer();

    function sanitize_data() {

        $volunteer_task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
        $hostel_name = filter_var($_POST['hostel'], FILTER_SANITIZE_STRING);
        $hostel_room = filter_var($_POST['room'], FILTER_SANITIZE_NUMBER_INT);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);

        return array('task' => $volunteer_task,'vdate' => $_POST['vdate'],'hostel' => $hostel_name, 'room' => $hostel_room, 'phone' => $phone);
    }

    function create_volunteer() {
        $userData = sanitize_data();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
            die("Connection Failed:" . mysqli_connect_error());

        $volunteer_task = $userData['task'];
        $date = $userData['vdate'];
        $hostel_name = $userData['hostel'];
        $hostel_room = $userData['room'];
        $phone = $userData['phone'];
        $user_id = $_SESSION['auth']['user_id'];
    
        $sql_query = "INSERT INTO volunteers (user_id,task,vdate,hostel, room,phone) VALUES('$user_id','$volunteer_task','$date','$hostel_name','$hostel_room','$phone')";

        if(mysqli_query($conn, $sql_query)) 
            header('location:thankyouu.php');
        else 
            echo "Error: " . $sql . "" . mysqli_error($conn);
        
        mysqli_close($conn);
    }

    function getUser($user_id){
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";

        $conn = mysqli_connect($servername, $username, $password, $database_name);
        $sql_query = "SELECT * from signup where user_id=$user_id";
        $result = mysqli_query($conn, $sql_query);
        $row=mysqli_fetch_assoc($result);
        return $row;

    }      

