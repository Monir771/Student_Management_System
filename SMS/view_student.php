<?php
include 'dbconnect.php';
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
        <h3 class="text-center text-success"><?php echo @$_GET['update_success']; echo @$_GET['update_error']; echo @$_GET['delete_msg']; ?></h3>
            <h2 class="text-center text-primary pt-3 font-weight-bold">Student management system</h2>
            <div class="container bg-primary" id="formsetting">
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">View student details</h3>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <table class="table table-bordered text-white table-responsive">
                            <thead>
                                <tr>
                                    <th>SNO.</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Fathername</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Birthdate</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>Nationality</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql="select * from student_detail";
                            $run=mysqli_query($conn,$sql);
                            $i=1;
                            while($row=mysqli_fetch_assoc($run))
                            {
                            ?>

                            
                            <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['father_name']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['birthdate']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['district']; ?></td>
                                    <td><?php echo $row['nation']; ?></td>
                                    <td>
                                        <a href="st_image/<?php echo $row['photo'];?>">
                                        <img src="st_image/<?php echo $row['photo'];?>"width="50" height="50"></a>
                                    </td>
                                    <td>
                                        <a style="color:white; text-decoration:none"; href="edit_student_detail.php?edit_student=<?php echo $row['st_id']; ?>">Edit</a>|
                                        <a style="color:white; text-decoration:none"; href="delete_student_detail.php?delete_student=<?php echo $row['st_id']; ?>">Delete</a>

                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?> 
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>