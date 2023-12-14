<?php
include_once "global.php";
$name = mysqli_real_escape_string($connection, $_POST['serviceName']);
$desc = mysqli_real_escape_string($connection, $_POST['serviceDescription']);
$price = mysqli_real_escape_string($connection, $_POST['servicePrice']);
$salonID = 4;
// Prepare statement
$query = $connection->prepare("INSERT INTO `Service` (`SalonID`, `ServiceName`, `Description`, `Price`) VALUES (?, ?, ?, ?)");
$query->bind_param("issd", $salonID, $name, $desc, $price);

// Execute the query
$query->execute();

// Check for success or error
if ($query->affected_rows > 0) {
    echo "Service added successfully.";
} else {
    echo "Error adding service: " . $query->error;
}

// Close the statement
$query->close();
header("Location: test.php");
?>
