<?php

require 'connection.php';
header("content-type:application/json");


if(isset($_POST['userId']) && isset($_POST['billNo']))
{
    $userId = $_POST['userId'];
    $billNo = $_POST['billNo']; 
    $Record = "SELECT * FROM bill WHERE userId = '$userId' and id = '$billNo' ";
    $Record_query = mysqli_query($con,$Record);

    if(mysqli_num_rows($Record_query) > 0)
    {
        while($row = mysqli_fetch_assoc($Record_query))
        {
            $response['success'] = "200";
            $response['billdata'][] = $row;
            $response['message'] = "All success records";
        }
    }
    else
    {
        $response['failed'] = "404";
        $response['message'] = "database empty";
    }
}
else
{
    $response['error'] = "500";
    $response['message'] = "ERROR:". mysqli_error($con);
}


echo json_encode($response);
?>