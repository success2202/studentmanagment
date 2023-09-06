<?php 
include("db_connection.php");
error_reporting(0);
ob_start(); 
session_start();?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}' ";
        $query= mysqli_query($con, $sql);
        if(!$query){
            die("QUERY_FAILED". mysqli_error($con));
        }
        $row = mysqli_fetch_array($query);

       if($row['usertype']=="student"){
        $_SESSION['username'] = $username;
        $_SESSION['usertype']="student";
            header("location: studentHome.php");

        }elseif($row['usertype']=="admin"){
            $_SESSION['username'] = $username;
            $_SESSION['usertype']="admin";
            header("location: adminHome.php");

        }else{
            $message= "username/password does not exist";
            $_SESSION['loginMessage']=$message;
            header("location: login.php");
        }
}
   
?>