<?php
    session_start();
    $user_id = $_SESSION['auth']['user_id'];

    if(isset($_POST['changepassword']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "helpinghands";
    
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if(!$conn) 
        {
            die("Connection Failed:" . mysqli_connect_error());
        }
       
        $sql_query = "SELECT * from signup where user_id=$user_id";
        $queryFetch = $conn->query($sql_query);
        $parsedData = $queryFetch->fetch_all(MYSQLI_ASSOC);
        if(count($parsedData)>0)
        {
                if($parsedData[0]['password']==md5($_POST['oldpassword']))
                {
                        if( $_POST["newpassword"] === $_POST["cpassword"])
                        {
                            $encrypted_newpassword = md5( $_POST["newpassword"]);
                            $query = "UPDATE signup set password='$encrypted_newpassword' WHERE user_id='$user_id'";
                            mysqli_query($conn,$query);
                            $_SESSION['success'] = "Password Changed Sucessfully";
                        }
                        else
                        {
                            $_SESSION['error'] = "Confirm password is not correct";
                        }
                }
            else
            {
                $_SESSION['error'] = "Invalid old password!";
            }
        }
        else
        {
            $_SESSION['error'] = "Data not available!";
        }
        if($_SESSION['auth']['role']=='admin')
            header('location:home-admin.php');
        else
            header('location:profile.php');
    }
?>