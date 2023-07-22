<?php
 
require '../../connection.php';
header("content-type: application/json");

$response = array();

$id = $_POST['id'];
if (!empty($id)) 
{
    $shirts = "SELECT * FROM shirts_measurement WHERE user_id = '$id'";
    $result = mysqli_query($con, $shirts);

    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
             $response['success'] = "200";
             $response['userId'] = $row['user_id']; 
        }
        $select = mysqli_query($con, "SELECT id, shirtsStyle FROM shirts_measurement WHERE user_id = '$id'");
        if (mysqli_num_rows($select) > 0) 
        {   
            while ($data = mysqli_fetch_assoc($select)) 
            {
                $response['success'] = "200";
                $response['style'][] = $data;
            }
        }
    } 
    else 
    {
        $response['success'] = "400";
        $response['message'] = "No shirt measurements found for the given user ID.";
    }
} 

if(isset($_POST['shirts']) && isset($_POST['id'])) 
{
    $id = $_POST['id'];
    $shirts = $_POST['shirts'];
    if (!empty($id) && !empty($shirts)) 
    {
        $insert = "INSERT INTO shirts_measurement(user_id, shirtsStyle) VALUES('$id', '$shirts')";
        $result = mysqli_query($con, $insert);
            
        if ($result) 
        {
            $response['success'] = "200";
            $response['message'] = "Shirt design inserted successfully.";
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
    $response['error'] = "400";
    $response['message'] = "Invalid request. Please provide the required parameters.";
}

echo json_encode($response);
?>
