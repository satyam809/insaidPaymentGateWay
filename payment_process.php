<?php
include('user.php');
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['contact'])){
    //echo "test";die;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $user_id = $obj->users($username,$email,$contact);
    if($user_id){
        $_SESSION['user_id'] = $user_id;
        echo json_encode(array('message'=>$user_id,'status'=>true));
        
    }
    
}


// if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
//     $obj=>payment_complete($_POST['payment_id'],$_SESSION['OID']);
    
// }
?>
