<?php

require '../connection.php';
header("content-type:application/json");

$id = $_POST['billNo'];
$status = $_POST['status'];

$checkdata = "SELECT * FROM measurement WHERE id = '$id'";
$checkdata_query = mysqli_query($con,$checkdata);

if (mysqli_num_rows($checkdata_query) > 0) 
{
    if (isset($status))
    {
       $updatestatus = "UPDATE measurement SET status = '$status' WHERE id = '$id'";
       $updatestatus_query = mysqli_query($con,$updatestatus);
       if ($updatestatus_query) 
       {
            $response['success'] = "200";
            $response['message'] = "status updateed";
       }
       else
       {
            $response['error'] = "400";
            $response['message'] = "ERROR:".mysqli_error($con);
       }

    }
}
else
{
    $response['failed'] = "500";
    $response['message'] = "fonud the data";
}


echo json_encode($response);
?>