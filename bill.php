<?php

require 'connection.php';
header("content-type:application/json");

function showData($billNO,$userId,$shopname,$shirtTotalAmount,$pantTotalAmount,$pantRate,$shirtRate)
{
    global $response,$con;

    $updateQuery = mysqli_query($con,"UPDATE bill SET shopname='$shopname',shirtTotalAmount = '$shirtTotalAmount',pantTotalAmount = '$pantTotalAmount',pantRate = '$pantRate',shirtRate = '$shirtRate',
    update_at = now() WHERE id = '$billNO' and userId = '$userId'");
    if($updateQuery)
    {
        $response['status'] = '200';
    }

}
if(isset($_POST['userId']))
{
    $billdata = "SELECT * FROM bill WHERE userId = '".$_POST['userId']."'";
    $data_query = mysqli_query($con,$billdata);
    if(mysqli_num_rows($data_query) > 0)
    {
        while($row = mysqli_fetch_assoc($data_query))
        {
            $response['billdata'][] = $row;
        }
    }
}
if(isset($_POST['id']) && isset($_POST['amount']))
{   
    $id = $_POST['id'];
    $amount = $_POST['amount'];

    $Record = "SELECT * FROM measurement WHERE id = '$id'";
    $Record_query = mysqli_query($con,$Record);
    $data = mysqli_fetch_assoc($Record_query);

    if($data)
    {   
            $qty = $data['pants_qty'] + $data['shirts_qty'];
            $insert_query = "INSERT INTO bill(id,userId,name,mobileNo,totalitem,pantQty,shirtQty,amount,advance,orderDate,delDate)VALUES('$id','{$data['user_id']}','{$data['customer_name']}','{$data['mobile_no']}','$qty','{$data['pants_qty']}','{$data['shirts_qty']}','$amount','{$data['advance']}','{$data['order_date']}','{$data['del_date']}')";
            $insert = mysqli_query($con,$insert_query);

            $delete_query = "DELETE FROM measurement WHERE id = '$id'";
            $delete = mysqli_query($con,$delete_query);

            
            $response['success'] = "200";
            $response['message'] = "data move in bill table";
    }
    else
    {
        $response['failed'] = "400";
        $response['message'] = "record not found";
    }
}
if(isset($_POST['id']) && isset($_POST['userId']))
 {
    $billNO = $_POST['id'];
    $userId = $_POST['userId'];
    $shopname = $_POST['shopname'];
    $shirtTotalAmount = $_POST['shirtTotalAmount'];
    $pantTotalAmount = $_POST['pantTotalAmount'];
    $pantRate = $_POST['pantRate'];
    $shirtRate = $_POST['shirtRate'];
                    
        if(!empty($shopname) || !empty($shirtTotalAmount) || !empty($pantTotalAmount) || !empty($pantRate) || !empty($shirtRate))
        {
              showData($billNO,$userId,$shopname, $shirtTotalAmount, $pantTotalAmount, $pantRate, $shirtRate);
        }
        else
        {
            // Handle empty values
            $response['status'] = '400';
            $response['message'] = 'One or more fields are empty.';
        }
}
else
{
    // Handle missing fields
    $response['status'] = '400';
    $response['message'] = 'One or more fields are missing.';
}


echo json_encode($response);
?>