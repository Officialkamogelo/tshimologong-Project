<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'pest');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Save form data to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, number, date, age) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $number, $date, $age);
    $stmt->execute();
    $stmt->close();

    // Redirect to the third screen
    header("Location: calculations.php");
    exit();
}
?>