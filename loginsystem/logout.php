<?php
// Get the current session ID
$currentSessionID = $_COOKIE["device_id"];

// Connect to your database
include'connect.php';

// Delete the row with the current session ID from the activesession table
$sql = "DELETE FROM active_sessions WHERE device_id = '$currentSessionID'";
if ($conn->query($sql) === TRUE) {
    echo "Session removed from database successfully";
} else {
    echo "Error removing session from database: ";
}

$conn->close();
//move main page
session_destroy();
setcookie("device_id", "", time() - 3600, '/');
setcookie("PHPSESSID", "", time() - 3600, '/');
header("location: ../index.php");
?>


