<?php

require "../connection.php";
header("content-type:application/json");

$pant = "SELECT * FROM measurement";
$result = mysqli_query($con,$pant);

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['measurement'][] = $row;
    }
}
else
{
    $response['error'] = "400";
    $response['message'] = "user data not found";
}

echo json_encode($response);


?>