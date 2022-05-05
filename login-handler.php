<?php
session_start();
if(empty($_POST)) {
    die("Invalid request!");
}

if(isset($_POST['email']) == 0 || isset($_POST['password']) == 0) {
    die("Invalid parameters!");
}

login_user();

function sanitize_data() {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $emailContents = explode("@", $email);
    if($emailContents[1] !== "banasthali.in") {
        $_SESSION["error"] = "*Invalid email!*";
        header('location:login.php');
        //die("Invalid email!");
    }
    //--------ADMIN LOGIN CHANGE---//
   // if($emailContents[0] === "admin" && $emailContents[1]=== "banasthali.in" ) {
    //    header('location:home-admin.php');
    //}
    //----ADMIN LOGIN CHANGE OVER--//
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    return array('email' => $email, 'password' => $password);
}

function login_user() {
    
    $userData = sanitize_data();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "helpinghands";

    $conn = mysqli_connect($servername, $username, $password, $database_name);
    
    if(!$conn) {
        die("Connection Failed:" . mysqli_connect_error());
    }

    $email = $userData['email'];
    $password = $userData['password'];
    $encrypted_password = md5($password);
    //$role=$userData['role'];

    // Check if user already exists
    $sql_query = "Select * from signup WHERE email = '$email'"; 
    $queryFetch = $conn->query($sql_query);

    
        if($queryFetch) {
            $parsedData = $queryFetch->fetch_all(MYSQLI_ASSOC);
            if(count($parsedData) == 1) {
                if($parsedData[0]['email'] === $userData['email'] && $parsedData[0]['password'] === $encrypted_password) {
                    //login success
                    print_r($parsedData[0]);
                    $_SESSION["auth"] = $parsedData[0];
                    if($parsedData[0]['role']=='user')
                        header('location:index.php');
                    else
                        header('location:home-admin.php');
                } else {
                    $_SESSION["error"] = "*Invalid Credentials*";   // for username and password doesnot match
                   //echo "Invalid details!";
                   header('location:login.php');
                }
            } else {
    
                $_SESSION["error"] = "*Something went wrong!*";   
                header('location:login.php');
                //echo "something went wrong!";
            }
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    
    mysqli_close($conn);
}
?>