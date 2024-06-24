<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}


include("db_connection.php");
$id = $_GET['edit_teacher'];
$sql = "SELECT * FROM teacher WHERE id='$id' ";
$query = mysqli_query($con, $sql);
$row=$query->fetch_assoc();

if(isset($_POST['update_teacher'])){
    
    $t_name = $_POST['name'];
    $teacher_desc = $_POST['description'];
    $teacher_image = $_FILES['image']['name'];
   $dst="./image/".$teacher_image;
   $dst_db="image/".$teacher_image;
   move_uploaded_file($_FILES['image']['name'], $dst);

   $query = "UPDATE teacher SET sname='$t_name', description='$teacher_desc', image='$teacher_image' 
   WHERE id='$id' ";
   $update_query = mysqli_query($con, $query);
   if($update_query){
       header("location: view_teacher.php");
   }else{
    echo " failed to update teacher";
}
}else{ 
    echo "failed to update teacher";
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
            <h1>Add Teacher</h1>
           <br>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">Teacher Name:</label>
                        <input type="text" name="name" value="<?= $row['sname'] ?>">
                    </div>
                    <div>
                        <label for="">Description:</label>
                        <textarea name="description" id="" cols="30" rows="10" value="<?= $row['description'] ?>">

                        </textarea>
                    </div>
                    <div>
                        <label for="">Image:</label>
                        <input type="file" name="image" value="<?= $row['image'] ?>">
                    </div>
                    <br>
                    <div>
                        <input  type="submit" class="btn btn-primary" name="update_teacher" value="Update Teacher">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html>