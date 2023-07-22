<?php

require "connection.php";
header("content-type:application/json");

$user = "SELECT username,email,mobile_no,provider FROM user ";
$result = mysqli_query($con,$user);

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['success'] = "200";
        $response['user'][] = $row;
    }
}
else
{
    $response['error'] = "400";
    $response['message'] = "record not found";
}

echo json_encode($response);
?>