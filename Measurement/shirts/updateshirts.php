<?php

require "../../connection.php";

header("content-type:application/json");

$shirts = $_POST['shirts'];
$id = $_POST['id'];

    $updatepass = mysqli_query($con,"UPDATE shirts_measurement SET shirtsStyle='$shirts' WHERE id='$id'");
    if ($updatepass>0) {
        $response['error']="200";
        $response['message']="shirts style update successfully!..";
    }
    else
    {
        $response['error']="400";
        $response['message']="shirts name update failed!..";
    }
    
echo json_encode($response);
?>