<?php 
include('../../loginsystem/connect.php');
session_start();

$email = $_SESSION['email'];
$title = sanitize_input($_POST['title']);
$article = sanitize_input($_POST['article']);

$stmt = $conn->prepare("INSERT INTO articles (email, title, article) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $title, $article);

if ($stmt->execute()) {
    header("Location: ../profile.php");
} else {
    header("Location: ../loginresponse/error.php");
}

$stmt->close();
$conn->close();

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>