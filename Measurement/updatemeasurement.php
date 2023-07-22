<?php

require '../connection.php';
error_reporting(0);
header("content-type:application/json");


    $id = $_POST['id'];
    $customer_name = $_POST['customerName'];
    $mobile_no = $_POST['mobileNo'];
    $order_date = $_POST['orderDate'];
    $del_date = $_POST['delDate'];
    $pants_qty = $_POST['pantsQty'];
    $shirts_qty = $_POST['shirtsQty'];
    $pantsdata =$_POST['pants'];
    $pantsarray = explode(',',$pantsdata);   
    $pantsarray = array_map('trim',$pantsarray);
    $shirtsdata =$_POST['shirts'];
    $shirtarray = explode(',',$shirtsdata);
    $shirtarray = array_map('trim',$shirtarray);
    $pant_waist = $_POST['pantWaist'];
    $pant_length = $_POST['pantLength'];
    $pant_frontrise = $_POST['pantFrontrise'];
    $pant_thais = $_POST['pantThais'];
    $pant_sit = $_POST['pantSit'];
    $pant_knee = $_POST['pantKnee'];
    $pant_inseam = $_POST['pantInseam'];
    $pant_moli = $_POST['pantMoli'];
    $shirt_chest = $_POST['shirtChest'];
    $shirt_waist = $_POST['shirtWaist'];
    $shirt_length = $_POST['shirtLength'];
    $shirt_bicep = $_POST['shirtBicep'];
    $shirt_arm_hole = $_POST['shirtArmHole'];
    $shirt_sholder = $_POST['shirtSholder'];
    $shirt_sleeve_length = $_POST['shirtSleeveLength'];
    $shirt_sleeveCuffwidth = $_POST['shirtCuffwidth'];
    $shirt_neck_open = $_POST['shirtNeck'];
    $shirt_front1 = $_POST['front1'];
    $shirt_front2 = $_POST['front2'];
    $shirt_front3 = $_POST['front3'];
    $note = $_POST['note'];

    $checkdata = "SELECT * FROM measurement WHERE id ='$id'";
    $checkdata_query = mysqli_query($con,$checkdata);

    if(mysqli_num_rows($checkdata_query) > 0)
    {
        if(!empty($customer_name) || !empty($mobile_no) || !empty($order_date) || !empty($del_date) || !empty($pants_qty) || !empty($shirts_qty) || !empty($pants) || !empty($shirts) || !empty($note) || !empty($pant_waist) || !empty($pant_length) || !empty($pant_frontrise) || !empty($pant_thais) || !empty($pant_sit) || !empty($pant_knee) || !empty($pant_inseam) || !empty($pant_moli) || !empty($shirt_chest) || !empty($shirt_waist) || !empty($shirt_length) || !empty($shirt_bicep) || !empty($shirt_arm_hole) || !empty($shirt_sholder) || !empty($shirt_sleeve_length) || !empty($shirt_sleeveCuffwidth) || !empty($shirt_neck_open) || !empty($shirt_front1) || !empty($shirt_front2) || !empty($shirt_front3) || is_array($pantsarray) || is_array($shirtarray))
        {
            $pants = implode(',',$pantsarray);
            $shirts = implode(',',$shirtarray);

            $update_query = "UPDATE measurement SET customer_name = '$customer_name',mobile_no = '$mobile_no',order_date = '$order_date',del_date = '$del_date',pants_qty = '$pants_qty',shirts_qty = '$shirts_qty',pantMeasurement = '$pants',shirtMeasurement = '$shirts',note = '$note',pant_waist = '$pant_waist',pant_length = '$pant_length',pant_frontrise = '$pant_frontrise',pant_thais = '$pant_thais',pant_hip = '$pant_sit',pant_knee = '$pant_knee',pant_inseam = '$pant_inseam',pant_legopning = '$pant_moli',shirt_chest = '$shirt_chest',shirt_waist = '$shirt_waist',shirt_length = '$shirt_length',shirt_bicep = '$shirt_bicep',shirt_arm_hole = '$shirt_arm_hole',shirt_sholder = '$shirt_sholder',shirt_sleeve_length = '$shirt_sleeve_length',shirt_sleeve_open = '$shirt_sleeveCuffwidth',shirt_neck_open = '$shirt_neck_open',front1 = '$shirt_front1',front2 = '$shirt_front2',front3 = '$shirt_front3'  WHERE id = '$id'";
            $update= mysqli_query($con,$update_query);
            if ($update>0) {
                $response['success']="200";
                $response['message']=" update successfully!..";
            }
            else
            {
                $response['error']="400";
                $response['message']="error". mysqli_error($con);
            } 
        
        }

    }
    else
    {
        $response['error'] = "500";
        $response['message'] = "fonud the data";
    }


echo json_encode($response);
?>