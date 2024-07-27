<?php

include 'connect.php';
session_start();
$id = $_SESSION['id'];

if(isset($_POST['update_details'])){

    $beds = $_POST['beds'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date=$_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
   
    $select = " SELECT * FROM `admindoctor_details` WHERE beds = '$beds' &&  doctor_name = '$doctor_name' ";

    $result = mysqli_query($conn, $select);
    
 
    if(empty($beds) || empty( $doctor_name) || empty($appointment_date)||empty($appointment_time) ){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE `admindoctor_details`  SET beds='$beds', doctor_name='$doctor_name', appointment_date='$appointment_date' ,appointment_time='$appointment_time' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
        $message[] = 'new details added successfully';
    
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

 




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
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


<div class="admin-product-form-container centered">

<?php
      $select = mysqli_query($conn, "SELECT * FROM `admindoctor_details` WHERE id = '$id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the details</h3>
      <div class="inputbox">
      <input type="hidden" name="beds" value="<?php echo $fetch['beds']; ?>">
            <span>beds :</span>
            <input type="text" name="beds" placeholder="enter beds no" min="0" value="<?php echo $fetch['beds']; ?>" class="box">

            <input type="hidden" name="doctor_name" value="<?php echo $fetch['doctor_name']; ?>">
            <span>doctor's name :</span>
            <input type="text" name="doctor_name" placeholder="enter doctor's name"  value="<?php echo $fetch['doctor_name']; ?>" class="box">
      </div>
            
      <div class="inputbox">
      <input type="hidden" name="appointment_date" value="<?php echo $fetch['appointment_date']; ?>">
            <span>appointment date :</span>
            <input type="text" name="appointment_date" placeholder="enter doctor's appointment date "  value="<?php echo $fetch['appointment_date']; ?>" class="box">

            <input type="hidden" name="appointment_time" value="<?php echo $fetch['appointment_time']; ?>">
            <span>doctor's appointment_time :</span>
            <input type="text" name="appointment_time" placeholder="enter doctor's appointment time"  value="<?php echo $fetch['appointment_time']; ?>" class="box">
      </div>
      <input type="submit" value="update details" name="update_details" class="btn">
      <a href="details.php" class="btn">go back!</a>
   </form>
   


   

   

</div>

</div>

</body>
</html>