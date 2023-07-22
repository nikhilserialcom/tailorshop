<?php

require "../../connection.php";
header("content-type:application/json");

$pant = "SELECT * FROM pants_measurement ORDER BY id DESC limit 1";
$result = mysqli_query($con,$pant);

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['pant'][] = $row;
    }
}
else
{
    $response['error'] = "400";
}

echo json_encode($response);
?>