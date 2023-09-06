<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}

include("db_connection.php");
$id = $_GET['edit_student'];
$sql = "SELECT * FROM users WHERE id='$id' ";
$query = mysqli_query($con, $sql);
$row=$query->fetch_assoc();


if(isset($_POST['edit_stdnt'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "UPDATE users SET username='$name', email='$email', phone='$phone', user_password='$password' 
    WHERE id='$id' ";
    $update_query = mysqli_query($con, $query);
    if($update_query){
        header("location: view_student.php");
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
    
<style type="text/css">
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div_deg{
        background-color: skyblue;
        width: 400px;
        padding-bottom: 70px;
        padding-top: 70px;
    }

</style>

</head>
    <body>
    <?php
       include("admin_sidebar.php");
       ?>

        <div class="sidebar_content"> 
            <center>
            <h1>Edit Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="name" value="<?= $row['username'] ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email"  value="<?= $row['email'] ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone"  value="<?= $row['phone'] ?>">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="password" name="password"  value="<?= $row['user_password'] ?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="edit_stdnt" value="Update Student">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html>