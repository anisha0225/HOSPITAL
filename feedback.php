<?php



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedbacks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
     body{
            background-color: #d0c6d1;
        }

        .container1 {
    max-width: 600px;
    margin: 115px auto;
    padding: 50px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

form {
    display: flex;
    flex-direction: column;
    padding:20px;
}

label {
    margin-bottom: 8px;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 16px;
}

button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border: none;
    cursor: pointer;
}

.feedback-box {
    margin-bottom: 30px;
    padding: 30px;
    padding-top: 12px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
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
    <div class="container1">
        <h2>Feedbacks</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="feedback-box">';
                echo '<strong>' . $row["name"] . '</strong><br>';
                echo '<p>' . $row["feedback"] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No feedbacks yet.</p>';
        }
        ?>
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
</html>

<?php
$conn->close();
?>