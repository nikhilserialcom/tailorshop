<?php

require 'connection.php';
header("content-type:application/json");


if(isset($_POST['userId']))
{
    $userId = $_POST['userId'];

    $successcount = "SELECT count(*) as success FROM measurement WHERE user_id = '$userId' AND status = 'complete'";
    $successcount_query = mysqli_query($con,$successcount);

    if(mysqli_num_rows($successcount_query) > 0)
    {
        $row = mysqli_fetch_assoc($successcount_query);
        $response['success'] = "200";
        $response['complete'] = $row['success'];
    }
    else
    {
        $response['failed'] = "400";
        $response['message'] = "record not found";
    }


    $pendingcount = "SELECT count(*) as pending FROM measurement WHERE user_id = '$userId' AND status = 'pending'";
    $pendingcount_query = mysqli_query($con,$pendingcount);

    if(mysqli_num_rows($pendingcount_query) > 0)
    {
        $row = mysqli_fetch_assoc($pendingcount_query);
        $response['success'] = "200";
        $response['pending'] = $row['pending'];
    }
    else
    {
        $response['failed'] = "400";
        $response['message'] = "record not found";
    }

    $runningcount = "SELECT count(*) as running FROM measurement WHERE user_id = '$userId' AND status = 'running'";
    $runningcount_query = mysqli_query($con,$runningcount);

    if(mysqli_num_rows($runningcount_query) > 0)
    {
        $row = mysqli_fetch_assoc($runningcount_query);
        $response['success'] = "200";
        $response['running'] = $row['running'];
    }
    else
    {
        $response['failed'] = "400";
        $response['message'] = "record not found";
    }

    $failcount = "SELECT count(*) as fail FROM measurement WHERE user_id = '$userId' AND status = 'fail'";
    $failcount_query = mysqli_query($con,$failcount);

    if(mysqli_num_rows($failcount_query) > 0)
    {
        $row = mysqli_fetch_assoc($failcount_query);
        $response['success'] = "200";
        $response['fail'] = $row['fail'];
    }
    else
    {
        $response['failed'] = "400";
        $response['message'] = "record not found";
    }
}
else
{
    $response['failed'] = "500";
    $response['message'] = "ERROR:";
}
echo json_encode($response);
?>