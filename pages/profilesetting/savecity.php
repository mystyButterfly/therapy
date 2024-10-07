<?php
include '../../loginsystem/connect.php';
session_start();
function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$email = $_SESSION['email'];

// Sanitize input data
$city = sanitize_input($_POST['city']);

// Inserting the city into the database for the current user using prepared statement
$stmt = $conn->prepare("UPDATE users SET city=? WHERE email=?");
$stmt->bind_param("ss", $city, $email);

if ($stmt->execute()) {
  header("Location: ../profile.php");
} else {
  header("Location: ../loginresponse/error.php");
}

$stmt->close();
$conn->close();


?>