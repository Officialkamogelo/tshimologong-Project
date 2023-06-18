<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'pest');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Calculate the total number of surveys completed
$totalSurveysQuery = $conn->query("SELECT COUNT(*) AS totalSurveys FROM registration");
$totalSurveysResult = $totalSurveysQuery->fetch_assoc();
$totalSurveys = $totalSurveysResult['totalSurveys'];

// Calculate the average age
$averageAgeQuery = $conn->query("SELECT AVG(age) AS averageAge FROM registration");
$averageAgeResult = $averageAgeQuery->fetch_assoc();
$averageAge = $averageAgeResult['averageAge'];

// Find the oldest person
$oldestPersonQuery = $conn->query("SELECT MAX(age) AS oldestAge FROM registration");
$oldestPersonResult = $oldestPersonQuery->fetch_assoc();
$oldestPersonAge = $oldestPersonResult['oldestAge'];

// Find the youngest person
$youngestPersonQuery = $conn->query("SELECT MIN(age) AS youngestAge FROM registration");
$youngestPersonResult = $youngestPersonQuery->fetch_assoc();
$youngestPersonAge = $youngestPersonResult['youngestAge'];

// Calculate the percentage of people who like Pizza
$pizzaQuery = $conn->query("SELECT COUNT(*) AS pizzaCount FROM registration WHERE checkbox1 = 1");
$pizzaResult = $pizzaQuery->fetch_assoc();
$pizzaCount = $pizzaResult['pizzaCount'];
$pizzaPercentage = round(($pizzaCount / $totalSurveys) * 100, 1);

// Calculate the average rating for "I like to eat out"
$eatOutQuery = $conn->query("SELECT AVG(checkbox1) AS averageRating FROM registration");
$eatOutResult = $eatOutQuery->fetch_assoc();
$averageRating = round($eatOutResult['averageRating'], 1);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Survey Calculations</title>
</head>
<body>
    <h1>Survey Calculations</h1>
    <p>Total number of surveys completed: <?php echo $totalSurveys; ?></p>
    <p>Average age of participants: <?php echo $averageAge; ?></p>
    <p>Oldest person that participated: <?php echo $oldestPersonAge; ?></p>
    <p>Youngest person that participated: <?php echo $youngestPersonAge; ?></p>
    <p>Percentage of people who like Pizza: <?php echo $pizzaPercentage; ?>%</p>
    <p>Average rating for "I like to eat out": <?php echo $averageRating; ?></p>
    <button onclick="window.location.href='index.html'">OK</button>
</body>
</html>