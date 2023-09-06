<?php
session_start();
       include("db_connection.php");


       if($_GET['student_id']){
        $student_id = $_GET['student_id'];
    $sql = "DELETE FROM users WHERE id = '{$student_id}' ";
    $query = mysqli_query($con, $sql);

    if($query){
        $_SESSION['message'] = 'student deleted successfully';
        header("location: view_student.php");
    }
    }

       ?>
