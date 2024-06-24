<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}

include("db_connection.php");
$sql = "SELECT * FROM teacher";
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
            <h1>All Teachers</h1>
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
                <th class="tb_th"> Teacher Name </th>
                <th class="tb_th"> Description </th>
                <th class="tb_th"> Images </th>
                <th class="tb_th"> Delete </th>
                <th class="tb_th"> Update</th>
            </tr>
        <?php
while($row=$query->fetch_assoc()){
    $teacher_id=$row['id'];
    $teacher_name = $row['sname'];
    $teacher_desc = $row['description'];
    $teacher_image = $row['image'];
    




        ?>

            <tr>
                <td class="tb_td"> <?= $teacher_id ?></td>
                <td class="tb_td"> <?= $teacher_name ?></td>
                <td class="tb_td"> <?= $teacher_desc ?></td>
                <td class="tb_td"> <?= $teacher_image ?></td>
                
                <td class="tb_td"> <?php
                 echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are you
                sure you want to delete this'); \" 
                href='delete.php?teacher_id={$row['id']}'> Delete </a>";
                ?>
                </td>
                <td class="tb_td"> <?php
                 echo "<a class='btn btn-success' onClick=\" javascript:return confirm('Are you
                sure you want to Edit this'); \" 
                href='update_teacher.php?edit_teacher={$row['id']}'> Edit </a>";
                ?>
                </td>
            </tr>
<?php } ?>
           </table>
        </div>
        </center>
    </body>
</html>