<?php
session_start();
$id = $_SESSION['id'];



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['add_details'])){

   /*$beds = $_POST['beds'];
   $doctor_name = $_POST['doctor_name'];
   $appointment_time = $_POST['appointment_time'];
   $appointment_date = $_POST['appointment_date'];
   $specification=$_POST['specification'];
   $username=$_POST['username'];
   $hospitalname=$_POST['hospitalname'];
   $password=$_POST['password'];
  
   $select = " SELECT * FROM `admindoctor_details` WHERE hospitalname = '$hospitalname' &&  $id = '$id' ";*/


   $beds = mysqli_real_escape_string($conn, $_POST['beds']);
   $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
   $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
   $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
   $specification = mysqli_real_escape_string($conn, $_POST['specification']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $hospitalname = mysqli_real_escape_string($conn, $_POST['hospitalname']);

   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);
   




   $select = " SELECT * FROM `admindoctor_details` WHERE hospitalname = '$hospitalname' &&  password = '$password' ";

   $result = mysqli_query($conn, $select);

   

   if( empty( empty($username)||$doctor_name) || empty($appointment_date) || empty($appointment_time) ||empty($specification)){
      $message[] = 'please fill out all';
   }else{
   
      $insert="INSERT INTO `admindoctor_details` (beds, doctor_name, appointment_date,appointment_time,specification,username,hospitalname,password,cpassword) VALUES(' $beds', '$doctor_name', '$appointment_date','$appointment_time','$specification','$username','$hospitalname','$password','$cpassword')";
      $upload = mysqli_query($conn,$insert);
      if($password != $cpassword){
         $error[] = 'password not matched!';
      }
    if($upload){
         $message[] = 'new details added successfully';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `admindoctor_details` WHERE id = $id");
   header('location:doctor_details.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>HOSPITAL DETAILS</h3>
         <input type="number" placeholder="enter beds no" name="beds" class="box">
         <input type="text" placeholder="enter doctor's name" name="doctor_name" class="box">
         <input type="text" placeholder="enter doctor appointment date" name="appointment_date" class="box">
         <input type="text" placeholder="enter doctor's appointment time" name="appointment_time" class="box">
         <input type="text" placeholder="enter doctor's specification" name="specification" class="box">
         <input type="text" placeholder="enter your username" name="username" class="box">
         <input type="text" placeholder="enter your hospital name" name="hospitalname" class="box">
         <input type="password" placeholder="enter your profile password" name="password" class="box">
         <input type="password" placeholder="confirm password" name="cpassword" class="box">
        
        
        
         <input type="submit" class="btn" name="add_details" value="add details">
         <a class="btn" href="details.php">Show Details</a>
         <a class="btn" href="doctorlogin.php">back to login page</a>
         
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM `admindoctor_details`");
   
   ?>
   
</div>


</body>
</html>