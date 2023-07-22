<?php
session_start();
require "connection.php";
header("content-type:application/json");

$google_name = $_POST['username'];
$google_email = $_POST['email'];
$google_id = $_POST['id'];


$_SESSION['google_id'] = $google_id;
$usercheck = "SELECT * FROM user Where email='$google_email'";
$check = mysqli_query($con,$usercheck);

if (mysqli_num_rows($check) > 0) {
    $row = mysqli_fetch_assoc($check);
    $response['exist'] = "500";
    $response['id'] = $row['id'];
    $response['message'] = "user alredy exist!..";
}
else
{
    $insert = "INSERT INTO user(username,email,token,provider)values('$google_name','$google_email','$google_id','1')";
    $result = mysqli_query($con,$insert);

    if ($result) {
        $sel = "SELECT * FROM user WHERE email = '$google_email'";
        $data = mysqli_query($con,$sel);
        $user = mysqli_fetch_assoc($data);

        $response['success'] = "200";
        $response['id'] = $user['id'];
        $response['message'] = "Register successfully done!..";
    }
    else
    {
        $response['error'] = "400";
        $response['message'] = "Error:" . mysqli_error($con);
    }

}


echo json_encode($response);

?>