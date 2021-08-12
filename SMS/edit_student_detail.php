<?php
include 'dbconnect.php';
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
            <a gref="add_student.php" class="list-group-item list-group-item-action">
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
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Edit student details</h3>
            <?php
            if(isset($_GET['edit_student'])){
                $edit_st_id=$_GET['edit_student'];
                $query="select * from student_detail where st_id ='$edit_st_id'";
                $run=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($run))
                {

            ?>
            <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                    <div class="form-group">
                        <label class="text-white">First name</label>
                        <input type="text" name="fname" value="<?php echo $row['fname'];?>" placeholder="Enter your first name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email'];?>" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Father name</label>
                        <input type="text" name="fathername" value="<?php echo $row['father_name'];?>" placeholder="Enter your Father name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Gender</label>
                        <input type="radio" name="gender" value="male" class="form-check-input ml-2" <?php if($row['gender']=='male') echo "checked"; ?>>
                        <label class="form-check-label text-white pl-4">Male</label>
                        <input type="radio" name="radio" value="Female" class="form-check-input ml-2" <?php if($row['gender']=='female') echo "checked"; ?>>
                        <label class="form-check-label text-white pl-4">Female</label>
                    </div>
                    <div class="form-group">
                        <label class="text-white">City</label>
                        <input type="text" name="city" placeholder="Enter your City" value="<?php echo $row['city'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Nationality</label>
                        <input type="text" name="nationality" placeholder="Enter your Nationality" value="<?php echo $row['nation'];?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                    <div class="form-group">
                        <label class="text-white">Last name</label>
                        <input type="text" name="lname" value="<?php echo $row['lname'];?>" placeholder="Enter your last name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Birthdate</label>
                        <input type="date" name="birthdate" value="<?php echo $row['birthdate'];?>" placeholder="Enter your Birthdate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">Mobile</label>
                        <input type="text" name="mobile" value="<?php echo $row['mobile'];?>" placeholder="Enter your Mobile" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white">District</label>
                        <input type="text" name="district" value="<?php echo $row['district'];?>" placeholder="Enter your District" class="form-control">
                    </div>
                    <label class="text-white">Student Photo</label>
                    <div class="input-group">
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file/Student Photo</label>
                        </div>
                    </div>
                    <?php }} ?>
                    <br>
                    <input type="submit" name="update" value="Update detail" class="btn btn-success px-5 mt-2">
                </div>
            </div>
            </form>
            </div>
        </section>
    </div>
</div>
</body>
</html> 
<?php 
if(isset($_POST['update'])){
    $edit_st_id=$_GET['edit_student'];

    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $fathername=mysqli_real_escape_string($conn,$_POST['fathername']);
    $birthdate=mysqli_real_escape_string($conn,$_POST['birthdate']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    $district=mysqli_real_escape_string($conn,$_POST['district']);
    $nationality=mysqli_real_escape_string($conn,$_POST['nationality']);
    $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
    $image=$_FILES['image']['name'];
    $image_type=$_FILES['image']['type'];
    $image_size=$_FILES['image']['size'];
    $image_tmp=$_FILES['image']['tmp_name'];

    $image_query="select * from student_detail where st_id='$edit_st_id'";
    $run=mysqli_query($conn,$image_query);
    while($row=mysqli_fetch_assoc($run)){
        $img=$row['photo'];
    }
    unlink('st_image/'.$img);
    if(!$image_type == 'image/jpg' or !$image_type == 'image/png'){
        $match_error="Invalid image formate";
    }
    else if($image_size<=2000){
        $type_error="Image size is larger.Image size should be less than 2 mb";
    }
    else
        move_uploaded_file($image_tmp,"st_image/$image");
        $sql="update student_detail set fname='$fname',lname='$lname',email='$email',father_name='$fathername',birthdate='$birthdate',gender='$gender',mobile='$mobile',district='$district',nation='$nationality',photo='$image' where st_id='$edit_st_id'";
        $run=mysqli_query($conn,$sql);
        if($run){
            echo "<script>window.open('view_student.php?update_success=Student data updated successfully','_self')</script>";
        }
        else{
            echo "<script>window.open('view_student.php?update_error=Unable to updated data.Please try again','_self')</script>";
        }
}
?>