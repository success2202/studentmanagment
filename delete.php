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

 
    if($_GET['teacher_id']){
        $teacher_id = $_GET['teacher_id'];
    $sql = "DELETE FROM teacher WHERE id = '{$teacher_id}' ";
    $query = mysqli_query($con, $sql);

    if($query){
        $_SESSION['message'] = 'teacher deleted successfully';
        header("location: view_teacher.php");
    }
    }

       ?>
