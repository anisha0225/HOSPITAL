<?php



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   $hospital_name = mysqli_real_escape_string($conn, $_POST['hospitalname']);
   
  
   $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);




   $select = " SELECT * FROM `admin` WHERE email = '$email' &&  password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpassword){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO `admin` (fullname,username,  password,email,hospitalname, phoneno,gender) VALUES('$fullname','$username','$password','$email','$hospitalname','$phoneno','$gender')";
         mysqli_query($conn, $insert);
         header('location:signupadmin.php');
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
   <title>register form</title>

  

</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   
}

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: crimson;
   color:#fff;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:crimson;
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: crimson;
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
    </style>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="fullname" required placeholder="enter your full name">
      <input type="text" name="username" required placeholder="enter your username">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="email" name="email" required placeholder="enter your email">
     
      
      
            
      <input type="text" name="hospitalname" required placeholder="enter your hospital name">
      
      <input type="text" name="phoneno" required placeholder="enter your contact no">
      <input type="text" name="gender" required placeholder="enter your gender">
      <input type="submit" name="submit" value="register now" class="form-btn">
      
      <p>already have an account?<a href="admin_login1.php">Login Now</a></p>
      <a href="index.php">Back to home page</a>
   </form>

</div>

</body>
</html>