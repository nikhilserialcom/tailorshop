<?php

require "../connection.php";
header("content-type:application/json");

$id = $_POST['id'];

$delete =mysqli_query($con,"DELETE FROM measurement WHERE id='$id'");

if ($delete > 0) {
    $response['error']="200";
    $response['message']="measurement has been deleted";
}
else
{
    $response['error']="400";
    $response['message']="measurement has not been deleted";
}

echo json_encode($response);
?>