<?php

require "../../connection.php";
header("content-type:application/json");
$pants = $_POST['pants'];

$id = $_POST['id'];
 
    $updatepass = mysqli_query($con,"UPDATE pants_measurement SET pantsStyle='$pants' WHERE id='$id'");
    if ($updatepass>0) {
        $response['error']="200";
        $response['message']="pants style update successfully!..";
    }
    else
    {
        $response['error']="400";
        $response['message']="pant name update failed!..";
    }
    
echo json_encode($response);
?>