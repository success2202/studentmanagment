<?php
error_reporting(0);
session_start();


if(!isset($_SESSION['username'])){
    header("location: login.php");
}

if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title> student management system </title>
<link rel="stylesheet" type ="text/css" href="style.css">
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

 <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    
    <label class="logo" for=""> Holy Ghost College</label>
    <ul>
    <?php if(isset($_SESSION['username']) && $_SESSION['usertype']=='student'): ?>
        <li> <a href="studentHome.php">Profile</a> </li>
            <?php elseif(isset($_SESSION['username']) && $_SESSION['usertype']=='admin'): ?>
        <li> <a href="adminHome.php">Admin</a> </li>
        <?php endif; ?>
        <li> <a href="" class="fa fa-home">Home</a> </li>
        <li> <a href="">Contact</a> </li>
        <li> <a href="">Admission</a> </li>


        <?php //if(isLoggedIn()):  ?>

<?php //if(!is_Admin() && !is_Client()): ?>
<!-- <li>
    <a href="/cms/admin">ADMIN</a>
</li> -->

<?php //elseif(is_Admin()): ?>
    
<!-- <li>
    <a href="/cms/admin/dashboard.php">ADMIN</a>
</li> -->

<?php //endif; ?>

<?php
if(isset($_SESSION['username'])): ?>
<li> <a href="logout.php" class="btn btn-success">Logout</a> </li>
<?php else: ?>
        
    <li> <a href="login.php" class="btn btn-success">Login</a> </li>
       
 <?php endif; ?>
    </ul>
</nav>

<div class="section1">
    <label class="img_text" for="">HGC.... Recta Sapere!!!</label>
    <img class="main_img" src="images/home.jpeg">

</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class="welcome_img" src="images/students2.jpg" alt="">
        </div>
        <div class="col-md-8">
            <h2>Welcome To Holy Ghost College</h1>
            <p>Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services. Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services
Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership servicesFull-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services</p>

        </div>

    </div>

</div>

<center> <h1> OUR TEACHERS </h1> </center>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class= "teacher" src="images/school.jpg" alt="">
            <p>Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services</p>
        </div>
        <div class="col-md-4">
        <img class= "teacher" src="images/classroom2.jpeg" alt="">
        <p>Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services</p>
        </div>
        <div class="col-md-4">
        <img  class= "teacher" src="images/students.jpg" alt="">
        <p>Full-service marketing with expertise in 
strategy, program development, content 
development and writing. Project 
consulting and leadership services</p>
        </div>

    </div>

</div>


<center> <h1> OUR COURSES </h1> </center>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img class= "teacher" src="images/home.jpeg" alt="">
            <h3> Web Developer</h1>
        </div>
        <div class="col-md-4">
        <img class= "teacher" src="images/classroom.jpeg" alt="">
        <h3>Graphic Design</h1>
        </div>
        <div class="col-md-4">
        <img  class= "teacher" src="images/classroom2.jpeg" alt="">
        <h3>marketing</h1>
        </div>

    </div>

</div>
<center>
    <h1 class="adm">Admission Form</h1>
</center>
<div align="center" class="admission_form">
    <form action="contact_data.php" method="POST">
        <div class="adm_int">
            <label class="label_text" for="name"> Name</label>
            <input class="input_deg" type="text"name="sname">
        </div>
        <div class="adm_int">
            <label class="label_text" for="email"> Email</label>
            <input class="input_deg" type="email"name="email">
        </div>
        <div class="adm_int">
            <label class="label_text" for="phone"> Phone</label>
            <input class="input_deg" type="text"name="phone">
        </div>
        <div class="adm_int">
            <label class="label_text" for="message"> Message</label>
            <textarea class="input_txt" name="smessage" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="adm_int">
            
            <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Apply">
        </div>
    </form>
</div>

<footer>

<h3 class="footer_txt"> All Right Reserve @ceejayworks Nig LTD</h3>

</footer>
</body>
</html>