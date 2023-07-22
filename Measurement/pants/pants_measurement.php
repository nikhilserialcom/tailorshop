<?php

require "../../connection.php";
header("content-type:application/json");

$response = array();

$id = $_POST['id'];
if(!empty($id))
{
    $pant = "SELECT * FROM pants_measurement WHERE user_id = '$id'";
    $result = mysqli_query($con,$pant);

    if (mysqli_num_rows($result)>0) 
    {
         while ($row = mysqli_fetch_assoc($result)) 
        {
            $response['success'] = "200";
            $response['userId'] = $row['user_id'];    
        }
    }
    $select = mysqli_query($con,"SELECT id,pantsStyle FROM pants_measurement WHERE user_id = '$id'");
    if(mysqli_num_rows($select)>0)
    {   
        while($data = mysqli_fetch_assoc($select))
        {
            $response['success'] = "200";
            $response['style'][] = $data;
        }
    }
    else 
    {
        $response['error'] = "400";
        $response['message'] = "No pants measurements found for the given user ID.";
    }
}
if(isset($_POST['pants']) && isset($_POST['id']))
{
    $id = $_POST['id'];
    $pants = $_POST['pants'];
    if(!empty($id) && !empty($pants))
    {
        $insert = "INSERT INTO pants_measurement(user_id,pantsStyle)VALUES('$id','$pants')";
        $result = mysqli_query($con,$insert);
            
        if ($result) {
            $response['success'] = "200";
            $response['message'] = "pants design inserted!..";
        }
        else 
        {
            $response['error'] = "400";
            $response['message'] = "Failed to insert shirt design. Error: " . mysqli_error($con);
        }
    }
    
}
else
{
    $response['error'] = "500";
    $response['message'] = "Invalid request. please provide the required parameters"; 
}

echo json_encode($response);
?>