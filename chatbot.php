
<!DOCTYPE html>
<html>
<head>
    <title>Chatbot Interface</title>
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

</head>
<style>
    body {
    margin: 0;
    padding: 0;
    background-image: url('./picture/background1.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
}

.chatbot-container1 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.chatbot-box1 {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 70px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    width: 500px;
}

.chatbot-messages {
    height: 200px;
    overflow-y: auto;
}

.chatbot-message {
    margin: 10px 0;
    font-size: 30px;
}

.user-input {
    display: flex;
}

#user-input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 12px;
}

#send-button {
    margin-left: 5px;
    border: none;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
@media screen and (max-width:768px){
            .chatbot-container1 {
                width:100px;
            }
            .chatbot-box1 {
                width:100px;
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
<body>

    <div class="chatbot-container1">
        <div class="chatbot-box1">
            <div class="chatbot-messages" id="chatbot-messages">
                <div class="chatbot-message">Welcome to the Chatbot!</div>
            </div>
            <div class="user-input">
                <input type="text" id="user-input" placeholder="Type your message...">
                <button id="send-button">Send</button>
            </div>
        </div>
    </div>
    
    <script src="script1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>





