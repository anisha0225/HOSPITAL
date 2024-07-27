<?php



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $message = mysqli_real_escape_string($conn, $_POST['message']);
   



   $select = " SELECT * FROM `contact` WHERE email = '$email' &&  name = '$name' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'invalid';

   }else{

      if($name != $name){
         $error[] = 'invalid';
      }
      
      else{
         $insert = "INSERT INTO `contact` (name, email, message) VALUES('$name','$email','$message')";
         mysqli_query($conn, $insert);
         $message = true;
         header('location:thank.php');
         
      }
    
       

   }

};


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Hospital Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>


    
</head>
<body>

    <style>
        body{
            background-color: #d0c6d1;
        }







        .container1 {
    position: relative;
    max-width: 1600px;
    margin: 1 auto;
    padding: 300px; /* Adjust the padding as needed */
    box-sizing: border-box;
    background-image: url('./picture/background2.jpg'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    color: black; /* Text color on top of the background image */
}

h1, p {
    margin: 1;
    padding: 20px;

}


@media screen and (max-width: 768px) {
    .container1 {
        padding: 40px; /* Adjust the padding for smaller screens */
    }
}





        .card-container {

            background-color: transparent;
            
            padding: 15px;
            margin-top: 20px;
           

        }

        .card {
            background-color: transparent;
            transition: transform 0.3s;
            color:black;
            
        }
        .card img{
            width: 90%;
            height: 30vh
        }

        .card:hover {
            transform: scale(1.1);
            z-index: 1;
        }



        .map-container {
            
            height: 300px;
            padding: 30px;
            width:400px;
        }
        
        /* Style for the container holding the cards */
        .cards2-container {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
        }
        
        /* Style for individual cards */
        .cards2 {
            flex: 1;
            padding: 0px;
            border-radius: 10px;
            transition: transform 0.3s;
            cursor: pointer;
        }
        
        

        

       
       


        .container2 {
            position: relative;
            width: 100%;
            height: 40vh; 
            overflow: hidden;
            background-color: transparent;
            padding: 15px;
           
        }

        .moving-gif {
            position: absolute;
            top: 50%;
            left: -200px; 
            transform: translateY(-50%);
            animation: moveRight 7s linear infinite; 
            padding: 15px;
        }

        @keyframes moveRight {
            0% { left: -400px; }
            100% { left: calc(100% + 200px); } 
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


        .container3 {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    background-color: transparent;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 16px;
    background-color: transparent;
    box-shadow: 1px 1px 1px;
}

button {
    background-color: #4CAF50;
    padding: 10px;
    border: none;
    cursor: pointer;
   
}

.success{
    background-color: aqua;
    padding:5px 8px;
    text-align:center;
    color:#326b07;
    border-radius:3px;
    font-synthesis:14px;
    margin-top:10px;
}

.gif-overlay {
    position: absolute;
    top: 4;
    left: 6;
    width: 35%;
    height: 35%;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: pulse 2s infinite;
}

.gif-overlay img {
    max-width: 35%;
    max-height: 35%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }


       




    </style>

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

<!--<div class="container"data-aos="zoom-in-down">
    <img src="./picture/background.jpg" alt="Your GIF">
    <div class="text">
        <h2>YOUR HEALTH IS</h2>
        <h2>OUR FIRST PRIORITY</h2>
    </div>
</div>--->


<div class="container1">

            
        <h1 >Your Health Is</h1>
        <h1>Our First Priority</h1>
        <div class="gif-overlay">
        <img src="./picture/heart-removebg-preview.png" alt="Overlay GIF">
    </div>
</div>


<div class="card-container">
    <div class="card-deck">
        <div class="card" data-aos="zoom-in-down">
            <img src="./picture/6634380-removebg-preview.png" class="card-img-top" alt="Card Image 1">
            <div class="card-body">
              
                <p class="card-text">The pinnacle of exceptional hospital service encompasses compassionate patient care. The best hospital service prioritizes patient well-being and fosters a comforting environment. </p>
            </div>
        </div>
        <div class="card"data-aos="zoom-in-down">
            <img src="./picture/3824022-removebg-preview.png" class="card-img-top" alt="Card Image 2">
            <div class="card-body">
             
                <p class="card-text">We pride ourselves on our seamless coordination with paramedics and first responders, ensuring a smooth transition from the field to our emergency unit. Our commitment to patient-centered care. </p>
            </div>
        </div>
        <div class="card"data-aos="zoom-in-down">
            <img src="./picture/eldery_treatment_05-removebg-preview.png" class="card-img-top" alt="Card Image 3">
            <div class="card-body">
             
                <p class="card-text">Our page ensures round-the-clock availability to provide immediate care and support. With a dedicated team , we are here to serve you 24/7, ensuring your health and well-being are our top priorities, anytime you need us.</p>
            </div>
        </div>
    </div>
</div>






<div class="container2">
    <img src="./picture/ambulance-unscreen.gif" class="moving-gif" alt="Moving GIF">
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset:100,
        duration:500
    });
   
</script>



<section class="p-5">


    <div style="display: flex; flex-wrap: wrap;">
        
        <div class="map-container">
            <div id="map" style="width: 100%; height: 100%;"></div>
        </div>
        
        
       
            
           
        <div class="cards2-container">
            <div class="cards2">
            <h2>Contact Us</h2>
            <form method="post"action="index.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"></textarea>
                </div>
                <input type="submit" class="btn bg-light"style="box-shadow:1px 1px 1px" name="submit" value="Submit">
            </form>
        </div>
        </div>
    
              
            </div>

            
        </div>
    </div>
</section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



    <script>
        // Initialize the Leaflet map
        var map = L.map('map').setView([22.9596, 88.4478], 15); // Replace latitude and longitude with your desired coordinates
      
        // Add a marker to the map
        L.marker([22.9596, 88.4478]).addTo(map).bindPopup('JIS COLLEGE OF ENGINEERING').openPopup();
      
        // Add a tile layer (e.g., OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
      </script>
      
      <script>
          
       // Initialize Tilt.js for the card
       VanillaTilt.init(document.querySelectorAll(".card2-tilt"), {
          max: 25,
          speed: 400,
          glare: true,
          "max-glare": 0.2
      });
      
      
      
      </script>


    


</section>

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








  
  <script src="scripts.js"></script>
  </body>
  </html>


</body>
</html>
