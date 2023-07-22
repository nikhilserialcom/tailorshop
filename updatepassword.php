<?php
session_start();
require "connection.php";

$email = $_POST['email'];
$new = md5($_POST['new_password']);


$checkuser = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($con,$checkuser);

if (mysqli_num_rows($result)>0) {
    
    $updatepass = mysqli_query($con,"UPDATE user SET password='$new' WHERE email='$email'");
    if ($updatepass>0) {
        $response['success']="200";
        $response['message']="password update successfully!..";
    }
    else
    {
        $response['error']="400";
        $response['message']="error". mysqli_error($con);
    } 
}
else
{
    $response['exist']="500";
    $response['message']="user dose not exist!..";
}


echo json_encode($response);
?>