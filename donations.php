<?php
session_start();
if(!isset($_SESSION['auth'])){
    //echo "stop"; die();
    header('location:login.php');
    
}
else{
if(empty($_POST)) die("Invalid request!");
}

create_donator();

function sanitize_data() {


    //$item = filter_var($_POST['item'], FILTER_SANITIZE_STRING);
    $hostel_name = filter_var($_POST['hostel'], FILTER_SANITIZE_STRING);
    $hostel_room = filter_var($_POST['room'],FILTER_SANITIZE_NUMBER_INT );
    $phone = filter_var($_POST['ph'], FILTER_SANITIZE_NUMBER_INT);

    return array('item' => json_encode($_POST['item']),'hostel' => $hostel_name, 'room' => $hostel_room,'ph' => $phone);
}

function create_donator() {
    
    $userData = sanitize_data();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "helpinghands";

    $conn = mysqli_connect($servername, $username, $password, $database_name);
    
    if(!$conn) {
        die("Connection Failed:" . mysqli_connect_error());
    }

    $item = $userData['item'];
    $hostel_name = $userData['hostel'];
    $hostel_room = $userData['room'];
    $phone = $userData['ph'];

    $user_id = $_SESSION['auth']['user_id'];
    $sql_query = "INSERT INTO donators (user_id,item,hostel,room, ph) VALUES('$user_id','$item','$hostel_name','$hostel_room','$phone')";

    if(mysqli_query($conn, $sql_query)) {
        //echo "<h2> Thank you for Donating!</h2>";
        //echo "Thank you for Donating!";
        header('location:thankyou.php');
        
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }


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

?>

