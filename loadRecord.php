<?php
require_once 'user.php';
$result = $obj->recordsFetch();
//echo "<pre>";
//print_r($result->fetchAll(PDO::FETCH_ASSOC));
$output = $result->fetchAll(PDO::FETCH_ASSOC);
if ($output != "") {
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No data','status'=>false));
}
