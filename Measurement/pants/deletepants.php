<?php

require "../../connection.php";
header("Content-Type:application/json");

$response = array();

if(isset($_POST['deleteId']))
{
// Check if the 'id' parameter is provided
    $id = $_POST['deleteId'];
    if(!empty($id))
    {
        // Delete the record with the provided 'id'
        $delete = mysqli_query($con, "DELETE FROM pants_measurement WHERE id='$id'");

        if ($delete) {
            $response['success'] = "200";
            $response['message'] = "Pants design has been deleted";
        } else {
            $response['fail'] = "400";
            $response['message'] = "ERROR: Failed to delete pants design";
        }
    }
}
if(isset($_POST['pants']) && isset($_POST['updateId'])) {
    $id = $_POST['updateId'];
    $pants = $_POST['pants'];
    if(!empty($id) && !empty($pants))
    {
        // Update the 'pantsStyle' field for the record with the provided 'id'
        $update = mysqli_query($con, "UPDATE pants_measurement SET pantsStyle='$pants' WHERE id='$id'");

        if ($update) {
            $response['success'] = "201";
            $response['message'] = "Pants style updated successfully";
        } else {
            $response['fail'] = "400";
            $response['message'] = "ERROR: Failed to update pants style";
        }
    }
} 
else 
{
    $response['error'] = "500";
    $response['message'] = "Invalid request. Please provide the required parameters";
}

echo json_encode($response);
?>
