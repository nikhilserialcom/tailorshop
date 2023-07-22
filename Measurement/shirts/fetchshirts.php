<?php

require "../../connection.php";
header("content-type:application/json");

$id = $_POST['id'];

$shirts = "SELECT * FROM shirts_measurement WHERE user_id = '$id'";
$result = mysqli_query($con,$shirts);


if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['userId'] = $row['user_id'];
     
    }
    $select = mysqli_query($con,"SELECT id,shirtsStyle FROM shirts_measurement WHERE user_id = '$id'");
    if(mysqli_num_rows($select)>0)
    {   
        while($data = mysqli_fetch_assoc($select))
        {
            $response['style'][] = $data;
        }
    }
}
else
{
    $response['error'] = "400";
}

echo json_encode($response);
?>