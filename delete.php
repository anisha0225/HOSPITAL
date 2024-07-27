<?php
$host = "localhost";
$username = "root";
$password = "anisha@2502";
$database = "healthcare";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if delete array is set
    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteId) {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("DELETE FROM `users` WHERE id = ?");
            $stmt->bind_param("i", $deleteId);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Redirect back to the main page after deletion
    header("Location: dashboard.php");
    exit();
}

$conn->close();
?>
