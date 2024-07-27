<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
  <style>
        body{
            background-color: #d0c6d1;
        }
        .social-icons {
            font-size: 24px;
            margin: 0 10px;
            color: white; 
        }

        .footer {
            padding: 15px;
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 30px;
            padding-top: 70px;;
        }

        .gif {
            width: 90%;
            max-width: 700px;
            margin-right: 20px;
        }

        .text {
            width: 50%;
            max-width: 330px;
        }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light   fixed-top  "style="padding: 3px 6px ;box-shadow:1px 1px 1px;">
  <a class="navbar-brand" ><img src="hospitallogo-removebg-preview.png"alt="Hospital Logo" style="max-height: 50px;"></a>
  <a class="navbar-brand" >HEALTHCARE<alt="Hospital" style="max-height: 60px;color:black;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-dark bg-transparent" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark bg-transparent" href="about.php">About Us</a>
      </li>
      <li class="nav-item">
        <div class="btn-group">
          <button type="button" class="btn bg-transparent">Login</button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split bg-transparent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item bg-light" href="admin_login1.php">As an Admin</a>
            <a class="dropdown-item bg-light" href="user_login1.php">As a User</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <div class="btn-group">
          <button type="button" class="btn  bg-transparent">Sign Up</button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split bg-transparent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item bg-light" href="signupadmin.php">As an Admin</a>
            <a class="dropdown-item bg-light" href="signupuser.php">As a User</a>
          </div>
        </div>
      </li>



    
      <li class="nav-item">
        <a class="nav-link text-dark bg-transparent" href="chatbot.php">Chatbot</a>
      </li>

      
    </ul>
  </div>
</nav>
<div class="container"data-aos="zoom-in-down">
    <img src="./picture/movingpic.gif" class="gif" alt="Your GIF">
    <div class="text">
        <h2>Thank you for contacting us</h2>
        <h2>We will get back to you as soon as possible</h2>
        <a href="index.php" style="color:brown">Go to home page</a>
    </div>
</div>


    <footer class="bg-dark text-white text-center py-3">
    <p> All rights reserved. | Designed by JIS Students &copy; 2023</p>
     <div class="container text-center">
        <a href="https://www.facebook.com/OfficialJISCE/"><i class="social-icons fab fa-facebook"></i></a>
        
        <a href="https://www.instagram.com/jiscollege/?hl=en"><i class="social-icons fab fa-instagram"></i></a>
        <a href="https://twitter.com/jiscollege?lang=en"><i class="social-icons fab fa-twitter"></i></a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>







</body>