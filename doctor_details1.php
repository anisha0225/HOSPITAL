<?php
session_start();
$id = $_SESSION['id'];



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['add_details'])){

  

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

     

         
         <a class="btn" href="dashboard1.php">dashboard</a>
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM `admindoctor_details`");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <th>beds</th>
            <th>doctor name</th>
            <th>appointment date</th>
            <th>appointment time</th>
            <th>specification</th>
            
         </tr>
         </thead>
        
         <tr>
            <td><?php echo $row['beds']; ?></td>
            <td><?php echo $row['doctor_name']; ?></td>
            <td><?php echo $row['appointment_date']; ?></td>
            <td><?php echo $row['appointment_time']; ?></td>
            <td><?php echo $row['specification']; ?></td>
           
         </tr>
      <?php  }?>
      </table>
   </div>

</div>


</body>
</html>