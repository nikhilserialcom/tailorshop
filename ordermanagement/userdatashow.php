<?php

require '../connection.php';
header("content-type:application/json");

$userId = $_POST['userId'];
$status = $_POST['status'];

$Record = "SELECT * FROM measurement WHERE status = '$status' AND user_id = '$userId'";
$Record_query = mysqli_query($con,$Record);

if(mysqli_num_rows($Record_query) > 0)
{
    while($row = mysqli_fetch_assoc($Record_query))
    {
        $response['success'] = "200";
        $response['complete'][] = $row;
        $response['message'] = "All success records";
    }
}
else
{
    $response['failed'] = "500";
    $response['message'] = "record not found";
}


echo json_encode($response);
?>