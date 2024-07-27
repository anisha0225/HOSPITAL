<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      header('location:dashboard1.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <title>login</title>

   <!-- custom css file link  -->
   

</head>

   
  <style>
       @import url('https://fonts.googleapis.com/css?family=Abel');

body, html {
  color: #fff;
  font-family: 'Abel', sans-serif;
  margin: 0;
  padding: 0;
  background-color: transparent;
}

body {
  font-size: 1.2em;
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://wallpapercave.com/w/wp10475822.jpg) center no-repeat fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -ms-background-size: cover;
  background-size: cover;
}

.text-box {
  background-color: rgba(230, 126, 34,0.8);
  border-radius: 20px;
  margin: 2em auto;
  padding: 20px;
  width: 90%;
}

h1 {
  margin: 0;
  padding: 0;
  font-size: 2.8em;
  color: #fff;
  text-align: center;
  letter-spacing: 2px;
  word-spacing: 5px;
  line-height: 1em;
  font-weight: bold;
}

p {
  display: block;
  margin: 0;
  padding: 0;
  text-align: center;
  font-size: 1.2em;
  line-height: 1.2em;
}

hr {
  width: 70%;
  margin: 10px auto;
}

.container {
  background-color: rgba(21, 110, 133,0.7);
  border-radius: 20px;
  margin: auto;
  width: 90%;
  padding: 1em;
  
}

#survey-form {
  margin: 0 auto;
  width: 80%;
  padding: 10px;
}

.labels {
  display: inline-block;
  text-align: right;
  width: 40%;
  vertical-align: top;
  margin-top: 20px;
}

.input-tab {
  display: inline-block;
  text-align: left;
  width: 50%;
  margin-left: 10px;
}

.input-field {
  display: inline-block;
  width: 100%;
  padding: 5px;
  margin: 18px 0 0 10px;
  border: 1px solid #e67e22;
  border-radius: 4px;
  font-family: inherit;
  font-size: 15px;
  font-weight: bold;
}

::-webkit-input-placeholder {
   font-style: italic;
  font-weight: 300;
}

input {
  margin: 7px;
}

#dropdown {
  width: 100%;
  padding: 5px;
  margin: 20px 0 10px 10px;  
  border: 1px solid #e67e22;
  border-radius: 3px;
  font-family: inherit;
  font-size: 15px;
}


.btn{
  width: 100%;
  text-align: center;
  margin: 20px;
  color:#fff;
}


button {
  background-color: #bf6516;
  border-radius: 4px;
  color: white;
  font-size: 1em;
  font-weight: bold;
  font-family: inherit;
  padding: 10px 15px;
  border: 1px solid;
}

button:hover {
  background-color: black;
}

footer {
  text-align: center;
  font-size: 17px;
  margin: 20px;
}

footer a {
  color: #f39c12;
  position: relative;
  text-decoration: none;
  font-weight: bold;
}

footer a:hover {
  color: #f1c40f;
}

footer p {
  margin: 0;
  font-size: 17px;
}

@media only screen and (max-width: 768px) {
  body{
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://wallpapercave.com/wp/wp10475822.jpg) center no-repeat fixed;
  background-size: cover;
}
  
  h1 {
    font-size: 2em;
  }
  
  .labels {
    width: 100%;
    text-align: left;
  }
  .input-tab {
    width: 100%;
    float: left;
    margin-left: -10px;
  }
  .input-field {
    width: 100%;
  }
  select {
    width: 100%;
  }
  .btn {
    width: 100%;
    margin: auto;
  }
}


</style>
<body>


<div class="form-container">

  
    


<header>
  <div class="text-box">
    <h1 id="title">WELCOME TO HEALTHCARE!</h1><hr>
      <p id="description">LOGIN</p>
  </div>
</header>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
    <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

         <div class="labels">
          <label id="name-label" for="name">*  UserName</label></div>
        <div class="input-tab">
          <input class="input-field" type="username" name="username" placeholder="Enter your username" required autofocus></div>

         <div class="labels">
          <label id="email-label" for="email">* Email</label></div>
        <div class="input-tab">
          <input class="input-field" type="email"  name="email" placeholder="email@gmail.com" required></div>

          <div class="labels">
          <label id="password-label" for="password">* Password</label></div>
        <div class="input-tab">
          <input class="input-field" type="password" name="password" placeholder="Enter your password" required autofocus></div>

        
        
        
        <div class="btn">
          <button  type="submit" name="submit" value="login now">Login now</button>
        </div>
       
        
      </form>
      <a class="btn" href="index.php">Back to home page</a>
      <p>don't have an account? <a href="signupuser.php"style="color:yellow">regiser now</a></p>
    </div>

<footer>
  <div class="contact">
    <a href="https://github.com/linh4" target="_blank">
      <span class="icon"><i class="fa fa-github"></i></span></a>
    <a href="https://codepen.io/linh4/" target="_blank">
      <span class="icon"><i class="fa fa-codepen"></i></span></a>
    <a href="https://www.freecodecamp.org/linh4" target="_blank">
      <span class="icon"><i class="fa fa-free-code-camp"></i></span></a>
  </div>
      <p>All rights reserved. | Designed by JIS Students &copy; 2023</a></p>
</footer>


   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    

</div>

</body>
</html>

