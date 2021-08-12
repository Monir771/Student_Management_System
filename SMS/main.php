<?php
session_start();
if(!$_SESSION['email']){
    $_SESSION['login-first']="Please login first";
    header('Location:index.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    jQuery(document).ready(function($){
        $('#toggler').click(function(event){
            {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');
            }
        });
    });
</script>
</head>
<body>
<div class=d-flex id="wrap">
    <div class="sidebar bg-light borde-light">
        <div class="sidebar-heading">
            <p class="text-center">Manage Student</p>
        </div>
        <ul class=list-group list-group-flush>
            <a href="main.php" class="list-group-item list-group-item-action">
            <i class="fa fa-vcard-o"></i>DashBoard</a>
            <a href="add_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-user"></i>Add Student</a>
            <a href="view_student.php" class="list-group-item list-group-item-action">
            <i class="fa fa-eye"></i>View Student</a>
            <a href="user.php" class="list-group-item list-group-item-action">
            <i class="fas fa-users"></i>Users</a>
            <a href="logout.php" class="list-group-item list-group-item-action">
            <i class="fa fa-sign-out"></i>Logout</a>
        </ul>
    </div>
    <div class="main-body">
        <button class="btn btn-outline-light bg-primary mt-3" id="toggler">
            <i class="fa fa-bars"></i>
        </button>
        <section id="main-form">
            <h2 class="text-center text-primary pt-3 font-weight-bold">Student management system</h2>
            <div class="container bg-primary" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome to dashboard</h3>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="add_student.php" class="text-white text-center"><i class="fa fa-user"></i>
                    <h3>Add student details</h3></a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="view_student.php" class="text-white text-center"><i class="fa fa-eye"></i>
                    <h3>View student details</h3></a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="user.php" class="text-white text-center"><i class="fas fa-users"></i>
                    <h3>User</h3></a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="logout.php" class="text-white text-center"><i class="fa fa-sign-out"></i>
                    <h3>Logout</h3></a>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>