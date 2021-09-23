<?php
include('user.php');
if(isset($_POST['payment_id']) && isset($_POST['amount']) && isset($_POST['payment_status']) && isset($_POST['payment_description'])){
    
    $payment_id = $_POST['payment_id'];
    $amount = $_POST['amount'];
    $payment_status = $_POST['payment_status'];
    $payment_description = $_POST['payment_description'];
    //echo $_SESSION['user_id'],$payment_description,$amount,$payment_id,$payment_status;die;

    if($obj->orders($_SESSION['user_id'],$payment_description,$amount,$payment_id,$payment_status)){
        echo json_encode(array('message'=>'payment complete','status'=>true));
    }
    
}
?>
