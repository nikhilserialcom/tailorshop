<?php

require 'connection.php';
header("content-type:application/json");

$response = array();
if(isset($_POST['userId']))
{
    $userId = $_POST['userId'];
    $showPriceQuery = mysqli_query($con,"SELECT * FROM setprice WHERE userId = '$userId'");
    if(mysqli_num_rows($showPriceQuery) > 0)
    {
        $priceData = array();
        while($row = mysqli_fetch_assoc($showPriceQuery))
        {
                $priceData[] = $row; 
        }
            $response['status'] = '200';
            $response['priceData'] = $priceData;

    }
    else
    {
        $response['status'] = '400';
        $response['priceData'] = null;
    }
}

if(isset($_POST['userId']) && isset($_POST['pantPrice']) && isset($_POST['shirtPrice']))
{
    $id = $_POST['userId'];
    $pantPrice = $_POST['pantPrice'];
    $shirtPrice = $_POST['shirtPrice'];

    $checkPriceQuery = "SELECT * FROM setprice WHERE userId = '$id'";
    $checkPrice = mysqli_query($con,$checkPriceQuery);
    if(mysqli_num_rows($checkPrice) > 0)
    {
        if(!empty($pantPrice) || !empty($shirtPrice))
        {
            $updatePriceQuery = "UPDATE setprice SET pantprice = '$pantPrice',shirtprice = '$shirtPrice',create_at = now() WHERE userId = '$id'";
            $updatePrice = mysqli_query($con, $updatePriceQuery);
            if($updatePrice)
            {
                $response['status'] = '200';
                $response['message'] = 'Price updated!';
            }
        }
    }
    else
    {
        if(!empty($pantPrice) && !empty($shirtPrice))
        {
            $insertPriceQuery = "INSERT INTO setprice(userId,pantprice,shirtprice)VALUES('$id','$pantPrice','$shirtPrice')";
            $insertPrice = mysqli_query($con,$insertPriceQuery);

            if($insertPrice)
            {
                $response['status'] = '200';
                $response['message'] = 'Price inserted!';
            }
        }   
    }
}
else
{

    $response['status'] = "500";
    $response['message'] = "ERROR:";
}

echo json_encode($response);
?>