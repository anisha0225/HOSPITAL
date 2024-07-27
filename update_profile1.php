<?php

include 'connect.php';
session_start();
$id = $_SESSION['id'];

if(isset($_POST['profile_update'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
 
    mysqli_query($conn, "UPDATE `users` SET username = '$update_name', email = '$update_email' WHERE id = '$id'") or die('query failed');
    $fullname=  $_POST['fullname'];
    $update_fullname = mysqli_real_escape_string($conn, $_POST['update_fullname']);
    $phoneno=$_POST['phoneno'];
    $update_phoneno = mysqli_real_escape_string($conn, $_POST['update_phoneno']);
    $gender=$_POST['gender'];
    $update_gender=mysqli_real_escape_string($conn,$_POST['update_gender']);


  

   


    mysqli_query($conn, "UPDATE `users` SET username='$update_name' ,fullname = '$update_fullname',email='$update_email',phoneno='$update_phoneno',gender='$update_gender'  WHERE id = '$id'") or die('query failed');
    $message[] = 'updated successfully!';
}
 




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      
      <div class="flex">
      <div class="inputBox">
      <input type="hidden" name="username" value="<?php echo $fetch['username']; ?>">
            <span>username :</span>
            <input type="text" name="update_name" placeholder="enter username" value="<?php echo $fetch['username']; ?>" class="box">

            <input type="hidden" name="email" value="<?php echo $fetch['email']; ?>">
            <span>your email :</span>
            <input type="email" name="update_email" placeholder="enter email" value="<?php echo $fetch['email']; ?>" class="box">
         </div>
         <div class="inputBox">
           
         <input type="hidden" name="fullname" value="<?php echo $fetch['fullname']; ?>">
            <span> full name :</span>
            <input type="text" name="update_fullname" placeholder="enter full name" value="<?php echo $fetch['fullname'];?>" class="box">

            <input type="hidden" name="phoneno" value="<?php echo $fetch['phoneno']; ?>">
            <span> Contact no :</span>
            <input type="text" name="update_phoneno" placeholder="enter Contact no" value="<?php echo $fetch['phoneno'];?>" class="box">

            <input type="hidden" name="gender" value="<?php echo $fetch['gender']; ?>">
            <span> Gender :</span>
            <input type="text" name="update_gender" placeholder="enter gender" value="<?php echo $fetch['gender'];?>" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="profile_update" class="btn">
     
      <a href="dashboard1.php" class="delete-btn">go back <-</a>
      <a href="passupdate1.php" class="delete-btn">update password</a>
   </form>

</div>

</body>
</html>




