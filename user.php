<?php
session_start();
require 'config.php';
class User
{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function users($username,$email,$contact){
        $sql="insert into users(name,email,contact) values('$username','$email','$contact')";
        if($this->con->query($sql)){
            $_SESSION['user_id']=$this->con->lastInsertId();
            $user_id = $_SESSION['user_id'];
            return $user_id;
            //return true;
        }
        
    } 
    public function orders($user_id,$payment_description,$amount,$payment_id,$payment_status){
        if($this->con->query("insert into orders(user_id,payment_description,amount,payment_id,payment_status) values('$user_id','$payment_description','$amount','$payment_id','$payment_status')")){
            return true;
        }
    }
    public function recordsFetch()
    {

        $displayquery = "SELECT users.name,users.email,users.contact,orders.payment_description,orders.amount,orders.payment_id FROM users INNER JOIN orders ON users.id = orders.user_id";
        $result = $this->con->query($displayquery);
        //print_r($result->rowCount());die;
        return $result;
    }

}
$obj = new User();
