<?php

require "connection.php";

header("content-type:application/json");


$id = $_POST['user_id'];
$pant = "SELECT * FROM user where id='$id'";
$result = mysqli_query($con,$pant);

    if(mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result))
       {  
            $response['success'] = 'true';
            $response['userdata'] = $row;
            $response['message'] = 'Found the user data';
       }
    }
    else
    {
        $response['empty'] = "false";
        $response['message'] = "database empty";
    }
echo json_encode($response);
?>