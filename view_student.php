<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}

include("db_connection.php");
$sql = "SELECT * FROM users WHERE usertype='student' ";
$query = mysqli_query($con, $sql);


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
   .tb_th{
    padding: 20px;
    font-size: 20px;
}

.tb_td{
    padding: 20px;
    font-size: 15px;
    background-color: skyblue;
}
</style>
</head>
    <body>
    <?php
       include("admin_sidebar.php");
       ?>
<center>
        <div class="sidebar_content"> 
            <h1>All Student Record</h1>
            <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
            ?>
            <br><br>
           <table border="1px">
            <tr>
                <th class="tb_th"> S/N </th>
                <th class="tb_th"> Username </th>
                <th class="tb_th"> Email </th>
                <th class="tb_th"> Phone </th>
                <th class="tb_th"> Password </th>
                <th class="tb_th"> Delete </th>
                <th class="tb_th"> Update</th>
            </tr>
        <?php
while($row=$query->fetch_assoc()){
    $student_id=$row['id'];
    $username = $row['username'];
    $phone = $row['phone'];
    $email = $row['email'];
    $password = $row['user_password'];




        ?>

            <tr>
                <td class="tb_td"> <?= $student_id ?></td>
                <td class="tb_td"> <?= $username ?></td>
                <td class="tb_td"> <?= $email ?></td>
                <td class="tb_td"> <?= $phone ?></td>
                <td class="tb_td"> <?= $password ?></td>
                <td class="tb_td"> <?php
                 echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are you
                sure you want to delete this'); \" 
                href='delete.php?student_id={$row['id']}'> Delete </a>";
                ?>
                </td>
                <td class="tb_td"> <?php
                 echo "<a class='btn btn-success' onClick=\" javascript:return confirm('Are you
                sure you want to Edit this'); \" 
                href='update_student.php?edit_student={$row['id']}'> Edit </a>";
                ?>
                </td>
            </tr>
<?php } ?>
           </table>
        </div>
        </center>
    </body>
</html>