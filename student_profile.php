<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="admin"){
    header("location: login.php");
}

include("db_connection.php");
$name = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$name'";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($query);

if(isset($_POST['update_profile'])){
    $s_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

$sql1 = "UPDATE users SET username='$s_name', email='$email', phone='$phone', 
user_password='$password' WHERE username = '$name' ";
$query2 = mysqli_query($con, $sql1);
if($query2){
    echo "user updated successfully";
    header("location: student_profile.php");
}
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Dashboard</title>
        <link rel="stylesheet" type ="text/css" href="admin.css">

       <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

</head>
    <body>
        <?php include("student_sidebar.php"); ?>

        <div class="sidebar_content">
            <center>
                <h3>Update Profile</h3>

            <form action="" method="POST">
                <div class="div_deg">
                <div>
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?= $row['username'] ?>">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?= $row['email'] ?>">
                </div>
                <div>
                    <label for="">Phone</label>
                    <input type="number" name="phone" value="<?= $row['phone'] ?>">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?= $row['user_password'] ?>">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="update_profile">
                </div>
                </div>
            </form>
            </center>
        </div>
    </body>
</html>