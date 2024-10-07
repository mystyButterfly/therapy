<?php 
include('../../loginsystem/connect.php');

function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_GET['id'])) {
    $id = sanitize_input($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../profile.php");
    } else {
        header("Location: ../loginresponse/error.php");
    }

    $stmt->close();
} else {
    header("Location: ../loginresponse/error.php");
}

$conn->close();
?>
