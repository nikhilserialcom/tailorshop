 <?php

require "connection.php";
header("content-type:application/json");

$username = $_POST['username'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$password = md5($_POST['password']);
// $created = date('Y-m-d H:i:s');


$usercheck = "SELECT * FROM user Where email='$email'";
$check = mysqli_query($con,$usercheck);

if (mysqli_num_rows($check) > 0) {
    $response['exist'] = "500";
    $response['message'] = "user alredy exist!..";
}
else
{
    $insert = "INSERT INTO user(username,email,mobile_no,password)values('$username','$email','$mobile_no','$password')";
    $result = mysqli_query($con,$insert);

    if ($result) {
        $response['success'] = "200";
        $response['message'] = "Register successfully done!..";
    }
    else
    {
        $response['error'] = "400";
        $response['message'] = "Error:" . mysqli_error($con);
    }

}


echo json_encode($response);

?>