<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}

include("db_connection.php");

if(isset($_POST['submit_student'])){
    
    $student_username = $_POST['name'];
    $student_phone = $_POST['phone'];
    $student_email = $_POST['email'];
    $student_password = $_POST['password'];
    $usertype = "student";

$check = "SELECT * FROM users WHERE username='{$student_username}' ";
$check_query = mysqli_query($con, $check);
$row_count=mysqli_num_rows($check_query);
if($row_count==0){

$sql="INSERT INTO users(username, phone, email, usertype, user_password) VALUES('{$student_username}', 
'{$student_phone}', '{$student_email}', '{$usertype}', '{$student_password}')";
$query=mysqli_query($con, $sql);
if($query){
    echo " <script type='text/javascript'>  alert('student has been added successfully') </script>";
}else{
    echo " failed to add student";
}
}else{
    echo "username has been taken";
}

 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" type ="text/css" href="admin.css">

       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style>
    label{
    display: inline-block;
    text-align: right;
    width: 100px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.div_deg{
    background-color: skyblue;
    width: 400px;
    padding-top: 50px;
    padding-bottom: 50px;
}
</style>
    </head>
    <body>
    <?php
       include("admin_sidebar.php");
       ?>

        <div class="sidebar_content"> 
            <center>
            <h1>Add Student</h1>
           <br>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label for="">Username:</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label for="">Email:</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label for="">Phone:</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label for="">Password:</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input  type="submit" class="btn btn-primary" name="submit_student" value="Add Student">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html>