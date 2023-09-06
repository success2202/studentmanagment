<?php
include("db_connection.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}elseif($_SESSION['usertype']=="student"){
    header("location: login.php");
}


// selecting the data from the database for student who applied

$sql = "SELECT * FROM admission ";
$query = mysqli_query($con, $sql);
if(!$query){
    die("QUERY_FAILED". mysqli_error($con));
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
    </head>
    <body>
        
       <?php
       include("admin_sidebar.php");
       ?>
        <div class="sidebar_content"> 
        <center>
            <h1> Applied For Admission</h1>
            <br> <br>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px; ">S/N</th>
                    <th style="padding: 20px; font-size: 15px; ">Name</th>
                    <th style="padding: 20px; font-size: 15px; ">Email</th>
                    <th style="padding: 20px; font-size: 15px; ">Phone</th>
                    <th style="padding: 20px; font-size: 15px; ">Message</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($query)){
                    $id = $row['id'];
                    $name = $row['sname'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $message = $row['smessage'];

                ?>
                <tr>
                    <td style="padding: 20px; background-color: skyblue; font-size: 15px; "><?= $id ?></td>
                    <td style="padding: 20px; background-color: skyblue; font-size: 15px; "><?= $name ?></td>
                    <td style="padding: 20px; background-color: skyblue; font-size: 15px; "><?= $email ?></td>
                    <td style="padding: 20px; background-color: skyblue; font-size: 15px; "><?= $phone ?></td>
                    <td style="padding: 20px; background-color: skyblue; font-size: 15px; "><?= $message ?></td>
                </tr>
            <?php }
            ?>
            </table>
            </center>
        </div>
    </body>
</html>