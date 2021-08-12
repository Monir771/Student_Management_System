<?php
session_start();
include 'dbconnect.php';
$email_err=$pws_err=$success=$error='';
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $query="select * from register where email ='$email'";
    $run=mysqli_query($conn,$query);
    $row=mysqli_num_rows($run);
    if($row>0)
    {
        $email_err="Email is already exists.Please try with another email";

    }
    else if($password !== $cpassword)
    {
        $pws_err="Your password do not match";

    }
    else
    {
        $sql="insert into register(fname,email,password,status) values('$fname','$email','$password','unassigned')";
        $run=mysqli_query($conn,$sql);
        if($run){
            $success="Register Successfully";
        }
        else{
            $error="Unable to submit data.Please try again later...";
        }
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function content1(){
        document.getElementById("div1").style.display="block";
        document.getElementById("div2").style.display="none";

    }
    function content2(){
        document.getElementById("div1").style.display="none";
        document.getElementById("div2").style.display="block";

    }
</script>
</head>
<body>
<section class="">
    <p class="text-center taxt-warning font-weight-bold"><?php echo @$_SESSION['login-first']; ?></p>
    <h2 class="text-center text-primary pt-5 pb-4 font-weight-bold">Student Management System</h2>
    <div class="container bg-primary" id="formsetting">
        <h3 class="text-white text center py-3">Admin Login | Register Panel</h3>
        <div class="row">
            <div class="col-md-7 col-sm-7 col-12">
                <img src="image/1.png" class="img-fluid">
            </div>
            <div class="col-md-5 col-sm-5 col-12">
                <button class="btn btn-info px-5" onclick="content1()">Register</button>
                <button class="btn btn-info px-5" onclick="content2()">Login</button>
                <div id="div1" style="display: block;" class="mt-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label class="text-white">Full Name</label>
                        <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Email</label>
                        <span class="float-right text-white font-weight-bold"><?php echo $email_err;?></span>
                        <input type="text" name="email" placeholder="Enter your email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Confirm Password</label>
                        <span class="float-right text-white font-weight-bold"><?php echo $pws_err;?></span>
                        <input type="password" name="cpassword" placeholder="Re-enter your password" class="form-control" required="required">
                    </div>
                    <input type="submit" name="submit" value="Register" class="btn btn-success px-5">
                    <span class="float-right text-white font-weight-bold"><?php echo $success; echo $error;?></span>
                </form>
                </div>
                <div id="div2" style="display: none;" class="mt-4">
                <form method="post" action="">
                    <div class="form-group">
                        <label class="text-white">Email</label>
                        <input type="text" name="email" placeholder="Enter your email" class="form-control">
                    </>
                    <div class="form-group">
                        <label class="text-white">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control">
                    </div>
                    <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">

                </form>    
                </div>
            </div>

        </div>
    </div>
</section>
</body>
</html>
<?php
if(isset($_POST['submit1'])){
    $email=$_SESSION['email'] =$_POST['email'];
    $pwd=$_POST['password'];
    $sql="select * from register where email='$email'";
    $run=mysqli_query($conn,$sql);
    if(!$run){
        
        die("Query Failed". mysqli_error($conn));
        
    }
    while($row=mysqli_fetch_assoc($run)){
        $eemail=$row['email'];
        $password=$row['password'];
        $status=$row['status'];
        
    }
    if($email==$eemail && $pwd==$password && $status == 'assigned'){
        echo "<script>window.open('main.php?success=Logged in successfully','_self')</script>";
    }
    else{
        echo "<script>window.open('index.php?error=Username or Password is incorrect','_self')</script>";
    
    }
}
?>