<?php
include 'dbconnect.php';
session_start();
if(!$_SESSION['email']){
    $_SESSION['login-first']="Please login first";
    header('Location:index.php'); 
}
?>
<!DOCTYPE html>
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
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Users</h3>
                <div class="row">
                    <div class="col-md-auto col-sm-auto col-auto">
                        <table class="table table-bordered text-white table-responsive"  id="table1">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Add User</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                    <tbody>

                        <?php
        
    $conn= mysqli_connect('localhost', 'root', '', 'std_db');

                                            
    $sql= "SELECT * FROM register";
    $select_users= mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($select_users)){
        
        $user_id=$row['user_id'];
        $fname=$row['fname'];
        $email=$row['email'];
        $status=$row['status'];
        
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$fname</td>";
        echo "<td>$email</td>";
        echo "<td>$status</td>";
        
        echo "<td><a style='color:white; text-decoration:none'; href='user.php?add={$user_id}'>Add</a> </td>";
        echo "<td><a style='color:white; text-decoration:none'; href='user.php?delete={$user_id}'>Delete</a> </td>";
        echo "</tr>";
    }
 ?>
                               
                               </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
<?php
    
if(isset($_GET['add'])){
    $the_user_id=$_GET['add'];
    
    $sqll="UPDATE register SET status='assigned' WHERE user_id= {$the_user_id} ";
    $add_user= mysqli_query($conn,$sqll);
}
if(isset($_GET['delete'])){
    $the_user_id=$_GET['delete'];
    
    $sqls="DELETE FROM register WHERE user_id= {$the_user_id}";
    $delete= mysqli_query($conn,$sqls);

}                                                     
?>