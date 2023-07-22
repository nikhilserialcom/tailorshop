<?php

require 'connection.php';
header("content-type:application/json");



$successcount = "SELECT count(*) as success FROM measurement WHERE status = 'complete'";
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


$pendingcount = "SELECT count(*) as pending FROM measurement WHERE status = 'pending'";
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

$runningcount = "SELECT count(*) as running FROM measurement WHERE status = 'running'";
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

$failcount = "SELECT count(*) as fail FROM measurement WHERE status = 'fail'";
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
echo json_encode($response);
?>