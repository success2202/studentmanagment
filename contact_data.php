<?php
session_start();
include("db_connection.php");
if(isset($_POST['submit'])){
    $name =$_POST['sname'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $message =$_POST['smessage'];

    $sql = "INSERT INTO admission(sname, email, phone, smessage) VALUES('{$name}', '{$email}', {$phone}, '{$message}')";
    $query = mysqli_query($con, $sql);
    if(!$query){
        die("QUERY_FAILED". mysqli_error($con));
        
    }else{
        $_SESSION['message']="Your application has been submitted successfully";
        header("location: index.php");
    }
}
?>