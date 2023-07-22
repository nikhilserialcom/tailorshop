<?php

require "connection.php";
header("content-type:application/json");

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkuser = "SELECT * FROM user WHERE email='$email'";
    $check = mysqli_query($con,$checkuser);

    if (mysqli_num_rows($check)>0) {

        $checkuserquery = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $checkquery = mysqli_query($con,$checkuserquery);

        if (mysqli_num_rows($checkquery) > 0) {
            
            while($row = mysqli_fetch_assoc($checkquery))
            {
                $user= $row['id'];
                $_SESSION['provider'] = $row['provider'];
            }
            $response['success'] = "200";
            $response['id'] = $user;
            $response['masseage'] = "login successfully";

        }
        else
        {
            $response['error'] = "400"; 
            $response['masseage'] = "Worng credentials";
        }
    }
    else
    {

        $response['exist']="500";
        $response['message']="user done not exist";
    }

echo json_encode($response);
?>