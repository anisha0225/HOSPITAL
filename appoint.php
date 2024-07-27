<?php
// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "anisha@2502";
$dbname = "healthcare";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $specification = $_POST['specification'];
    $hospitalname=$_POST['hospitalname'];
    $keyword = "keyword";
    // Check if the doctor exists in the database
    $check_sql = "SELECT doctor_name, specification,hospitalname,appointment_date,appointment_time  FROM `admindoctor_details` WHERE specification LIKE '%$specification%' OR hospitalname LIKE '%$hospitalname'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Doctor exists, show appointment options
        $doctor = $result->fetch_assoc();
    } else {
        // Doctor doesn't exist
        $doctor = null;
    }
}

if (isset($_POST['schedule_appointment'])) {
    // Handle appointment scheduling logic here
    // ...

    header("Location: appoint2.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color:whitesmoke;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            padding-top: 30px;
        }

        .box {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 30px;
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
            box-shadow: 4px 8px 4px 4px #888888;
            text-align: center;
            font-size:15px;
            justify-content: center;
            align-items: center;

        }
        .btn{
   display: block;
   width: 100%;
   cursor: pointer;
   border-radius: .5rem;
   margin-top: 1rem;
   font-size: 1.3rem;
   padding:1rem 3rem;
   background: green;
   color:white;
   text-align: center;
}

.btn:hover{
   background: black;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="box">
        <h1>Doctor Appointment</h1>
        <?php if ($doctor) : ?>
            <h2>Doctor Found: <?php echo $doctor['doctor_name']; ?></h2>
            <p>Specialization: <?php echo $doctor['specification']; ?></p>
            <p>Place: <?php echo $doctor['hospitalname'];?></p>
            <h2>appointment date: <?php echo $doctor['appointment_date']; ?></h2>
            <p>appointment time: <?php echo $doctor['appointment_time']; ?></p>
            <form method="post">
                <input type="hidden" name="doctor_name" value="<?php echo $doctor['doctor_name']; ?>">
                <input type="hidden" name="specification" value="<?php echo $doctor['specification']; ?>">
                <input type="hidden" name="hospitalname" value="<?php echo $doctor['hospitalname']; ?>">
                <input type="hidden" name="appointment_date" value="<?php echo $doctor['appointment_date']; ?>">
                <input type="hidden" name="appointment_time" value="<?php echo $doctor['appointment_time']; ?>">
                <button type="submit" class="btn"name="schedule_appointment">Schedule Appointment go to appoint details </button>
                <a href="dashboard1.php" class="p-2">Dashboard</a>
            </form>
        <?php else : ?>
            <p>No doctor found with the specified specification.</p>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>
