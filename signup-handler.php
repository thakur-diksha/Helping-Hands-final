<?php
session_start();
//$_SESSION["favcolor"] = "green";
if(empty($_POST) || isset($_POST['submit']) == 0) die("Invalid request!");

if(isset($_POST['fname']) == 0 || isset($_POST['lname']) == 0 || isset($_POST['email']) == 0 || isset($_POST['password']) == 0) {
    die("Invalid parameters!");
}

$_SESSION['validationStatus'] = true;
create_user();

function sanitize_data() {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $emailContents = explode("@", $email);
    if($emailContents[1] !== "banasthali.in") {
        $_SESSION["error"] = "Invalid email!";
        $_SESSION['validationStatus'] = false;
        header('location:login.php');
        
       //die("Invalid email!");
    }

    $first_name = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    return array('fname' => $first_name, 'lname' => $last_name, 'email' => $email, 'password' => $password);
}

function create_user() {
    
    $userData = sanitize_data();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "helpinghands";

    $conn = mysqli_connect($servername, $username, $password, $database_name);
    
    if(!$conn) {
        die("Connection Failed:" . mysqli_connect_error());
    }
    
    $first_name = $userData['fname'];
    $last_name = $userData['lname'];
    $email = $userData['email'];
    $password = $userData['password'];
    $encrypted_password = md5($password);

    // Check if user already exists
    $sql_query = "Select * from signup WHERE email = '$email'"; 
    $queryFetch = $conn->query($sql_query);

    if($queryFetch) {
        $parsedData = $queryFetch->fetch_all(MYSQLI_ASSOC);
        if(count($parsedData)) {
            foreach($parsedData as $myRow) {
                if($myRow['email'] == $userData['email']) {
                $_SESSION["error"] = "Email already exists!";   
                header('location:login.php'); 
                $_SESSION['validationStatus'] = false;
                }
            }
        }
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    if($_SESSION['validationStatus']){
        $sql_query = "INSERT INTO signup (fname, lname, email, password) VALUES('$first_name','$last_name','$email','$encrypted_password')";

        if(mysqli_query($conn, $sql_query)) {
            unset($_SESSION['validationStatus']);
           header('location:login.php');
           die("Invalid Details!");
        }
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