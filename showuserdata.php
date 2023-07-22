<?php
session_start();
require "connection.php";

header("content-type:application/json");

$id = $_SESSION['user_id'];

if (isset($id)) {
    $pant = "SELECT id,user_id,customer_name,mobile_no,order_date FROM measurement where user_id='$id' ";
    $result = mysqli_query($con,$pant);

    if(mysqli_num_rows($result)>0) {
        while($row = mysqli_fetch_assoc($result)) {
            $response['measurement'][] = $row;
        }
    }
    else
    {
        $response['error'] = "400";
        $response['message'] = "database empty";
    }
}
else
{
    $response['error'] = "400";
    $response['message'] = "user not found";
}

echo json_encode($response);
?>