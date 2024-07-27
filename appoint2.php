<?php



$conn = mysqli_connect("localhost:3307","root","anisha@2502","healthcare");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  

  
   $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
   $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
   $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
   $specification = mysqli_real_escape_string($conn, $_POST['specification']);






   $select = " SELECT * FROM `pdf_data_table` WHERE fullname = '$fullname' &&  id = '$id' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpassword){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO `pdf_data_table` (fullname, phoneno,gender,doctor_name,appointment_date,appointment_time,specification) VALUES('$fullname','$phoneno','$gender','$doctor_name','$appointment_date','$appointment_time','$specification')";
         mysqli_query($conn, $insert);
         header('location:appoint2.php');
      }

   }

};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Appointment Form</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 120vh;
}

.container {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    box-sizing: border-box;
    padding-top: 10px;
}

h1 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
}

input,
select,
textarea {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin:10px;
}

button:hover {
    background-color: #45a049;
}

</style>
<body>

    <div class="container">
        <h1>Appointment Form</h1>

        <!-- User details form -->
        <form action="generate_pdf.php" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="phoneno">Phone Number:</label>
            <input type="tel" id="phoneno" name="phoneno" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <!-- Doctor details form -->
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required>

            <label for="appointment_date">Appointment Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>

            <label for="appointment_time">Appointment Time:</label>
            <input type="time" id="appointment_time" name="appointment_time" required>

            <label for="specification">Specification:</label>
            <textarea id="specification" name="specification" rows="4" required></textarea>

            <button type="submit">Submit</button>
            
          
        </form>
        <button onclick="redirectToDashboard()" class="button">Dashboard</button>
        
       
       
    </div>
    
   

    <script>
        function redirectToDashboard() {
            // Redirect to dashboard.php
            window.location.href = 'dashboard1.php';
        }
        function save() {
            // Redirect to dashboard.php
            window.location.href = 'appoint2.php';
        }
    </script>

</body>
</html>
