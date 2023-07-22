<?php
require "connection.php";
header("content-type:application/json");

error_reporting(0);
$id = $_POST['user_id'];
$username = $_POST['userName'];
$email = $_POST['email'];
$mobile_no = $_POST['mobileNo'];
$shopName = $_POST['shopName'];
$shopAddress = $_POST['shopAddress'];
$gender = $_POST['gender'];

$checkuser = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con,$checkuser);

if (mysqli_num_rows($result)>0) {
    
    if(!empty($username) || !empty($email) || !empty($mobile_no))
    {
        $update_query = "UPDATE user SET username = '$username',email = '$email',mobile_no = '$mobile_no' WHERE id = '$id'";
        $update= mysqli_query($con,$update_query);
        if ($update>0) {
            $response['success']="200";
            $response['message']="profile update successfully!..";
        }
        else
        {
            $response['error']="400";
            $response['message']="error". mysqli_error($con);
        } 
    
    }

    if(!empty($shopName) || !empty($shopAddress) || !empty($gender))
    {
        $shop_query = "UPDATE user SET shop_name = '$shopName',shop_address = '$shopAddress',gender = '$gender'  WHERE id = '$id'";
        $update_shop= mysqli_query($con,$shop_query);
        if ($update_shop>0) {
            $response['success']="200";
            $response['message']="shop details update successfully!..";
        }
        else
        {
            $response['error']="400";
            $response['message']="error". mysqli_error($con);
        } 
    }
    if(isset($_FILES['image']))
    {
        $photo = $_FILES['image'];
        if(!empty($photo))
        {   
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $file = rand(111111111,999999999).".jpg";
            $folderdir ="upload/";
            $filepath = $folderdir.$file;

            $image_query = "UPDATE user SET photo = '$filepath' WHERE id = '$id'";
            $update_image= mysqli_query($con,$image_query);
            if ($update_image>0) {
                move_uploaded_file($image_tmp_name,$filepath);
                $response['success']="200";
                $response['message']="profile update successfully!..";
            }
            else
            {
                $response['error']="400";
                $response['message']="error". mysqli_error($con);
            } 
        }
    }
}
else
{
    $response['exist']="500";
    $response['message']="user dose not exist!..";
}


echo json_encode($response);
?>