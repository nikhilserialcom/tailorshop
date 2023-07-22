<?php

require "../../connection.php";
header("Content-Type: application/json");

$response = array();

// Check if the 'id' parameter is provided
    $id = $_POST['deleteId'];
    if(!empty($id))
    {
        // Delete the record with the provided 'id'
        $delete = mysqli_query($con, "DELETE FROM shirts_measurement WHERE id='$id'");

        if ($delete) {
            $response['success'] = "200";
            $response['message'] = "shirts design has been deleted";
        } else {
            $response['fail'] = "400";
            $response['message'] = "ERROR: Failed to delete shirts design";
        }
    }
    
if (isset($_POST['shirts']) && isset($_POST['updateId'])) {
    $id = $_POST['updateId'];
    $shirts = $_POST['shirts'];
    if(!empty($id) && !empty($shirts))
    {
        // Update the 'pantsStyle' field for the record with the provided 'id'
        $update = mysqli_query($con, "UPDATE shirts_measurement SET shirtsStyle='$shirts' WHERE id='$id'");

        if ($update) {
            $response['success'] = "200";
            $response['message'] = "shirts style updated successfully";
        } else {
            $response['fail'] = "400";
            $response['message'] = "ERROR: Failed to update shirts style";
        }
    }
} 
else 
{
    $response['error'] = true;
    $response['message'] = "Invalid request. Please provide the required parameters";
}

echo json_encode($response);
?>
