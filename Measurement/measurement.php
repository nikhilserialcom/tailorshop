<?php

require '../connection.php';
header("content-type:application/json");

if(isset($_POST['user_id']))
{
    $user_id = $_POST['user_id'];
    $customer_name = $_POST['customer_name'];
    $mobile_no = $_POST['mobile_no'];
    $order_date = $_POST['order_date'];
    $del_date = $_POST['delDate'];
    $pants_qty = $_POST['pants_qty'];
    $shirts_qty = $_POST['shirts_qty'];
    $pants =$_POST['pants'];
    $shirts =$_POST['shirts'];
    $pant_waist = $_POST['pant_waist'];
    $pant_length = $_POST['pant_length'];
    $pant_frontrise = $_POST['pant_frontrise'];
    $pant_thais = $_POST['pant_thais'];
    $pant_hip = $_POST['pant_sit'];
    $pant_knee = $_POST['pant_knee'];
    $pant_inseam = $_POST['pant_inseam'];
    $pant_legopning = $_POST['pant_moli'];
    $shirt_chest = $_POST['shirt_chest'];
    $shirt_waist = $_POST['shirt_waist'];
    $shirt_length = $_POST['shirt_length'];
    $shirt_bicep = $_POST['shirt_bicep'];
    $shirt_arm_hole = $_POST['shirt_armHole'];
    $shirt_sholder = $_POST['shirt_sholder'];
    $shirt_sleeve_length = $_POST['shirt_sleeveLength'];
    $shirt_sleeve_open = $_POST['shirt_cuffwidth'];
    $shirt_neck_open = $_POST['shirt_neck'];
    $shirt_front1 = $_POST['front1'];
    $shirt_front2 = $_POST['front2'];
    $shirt_front3 = $_POST['front3'];
    $advance = $_POST['advance'];
    $note = $_POST['note'];

    if(!empty($customer_name) && !empty($mobile_no) && !empty($order_date) && !empty($del_date))
    {
        
        

            $insert = "INSERT INTO measurement(user_id,customer_name,mobile_no,order_date,del_date,pants_qty,shirts_qty,pantMeasurement,shirtMeasurement,pant_waist,pant_length,pant_frontrise,pant_thais,pant_hip,pant_knee,pant_inseam,pant_legopning,shirt_chest,shirt_waist,shirt_length,shirt_bicep,shirt_arm_hole,shirt_sholder,shirt_sleeve_length,shirt_sleeve_open,shirt_neck_open,front1,front2,front3,advance,note)VALUE('$user_id','$customer_name','$mobile_no','$order_date','$del_date','$pants_qty','$shirts_qty','$pants','$shirts','$pant_waist','$pant_length','$pant_frontrise','$pant_thais','$pant_hip','$pant_knee','$pant_inseam','$pant_legopning','$shirt_chest','$shirt_waist','$shirt_length','$shirt_bicep','$shirt_arm_hole','$shirt_sholder','$shirt_sleeve_length','$shirt_sleeve_open','$shirt_neck_open','$shirt_front1','$shirt_front2','$shirt_front3','$advance','$note')";
            $data = mysqli_query($con,$insert);
            if ($data) {
                    $response['success'] = "200";
                    $response['message'] = "measurement inserted";
                    
            }
            else
            {
                $response['error'] = "400";
                $response['message'] = "measurement not inserted";
            }   
    
    }
    else
    {
        $response['failed'] = "500";
        $response['message'] = "plaese enter the name,mobleno,orderdate and deldate";
    }
}
else
{
    $response['failed'] = "500";
    $response['message'] = "user not found";
}
echo json_encode($response);
?>
