<?php

require "../connection.php";
header("content-type:application/json");

if(isset($_POST['userId']))
{
    $userId = $_POST['userId'];
    $pant = "SELECT * FROM measurement WHERE user_id = '$userId' ORDER BY id DESC";
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
}
else
{
    $response['failed'] = "500";
    $response['message'] = "ERROR:";
}

echo json_encode($response);
?>