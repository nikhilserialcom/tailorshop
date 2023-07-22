<?php

require "connection.php";
header("content-type:application/json");



$bills = "SELECT * FROM bill";
$result = mysqli_query($con,$bills);

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['bills'][] = $row;
    }
}
else
{
    $response['error'] = "400";
    $response['message'] = "user data not found";
}

echo json_encode($response);
?>