<?php
include ('../csp.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("../loginsystem/connect.php");

if (isset($_COOKIE['device_id'])) {
    $device_id = $_COOKIE['device_id'];

    $stmt = $conn->prepare("SELECT active_sessions.* FROM `active_sessions` WHERE device_id=?");
    $stmt->bind_param("s", $device_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];

    }
    
    $stmt->close();
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lorem</title>
    <link rel="shortcut icon" href="../imagesmain/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <div>
    <header>
        <div class="header-label">
            <a href="../index.php"><img class="header-image" src="../imagesmain/logo.png" alt="" /></a>
        </div>
        <a href="./navigation/about.php">Про нас</a>
        <a href="./navigation/howtouse.php">Як користуватися</a>
        <a href="./navigation/news.php">Новини</a>
        <a href="./navigation/price.php">Ціни</a>
        <a href="./navigation/security.php">Угода користувача</a>
        <a href="../index.php#login-container">Вхід/реєстрація</a>
    </header>
    <div>
        <?php 
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $stmt = $conn->prepare("SELECT users.* FROM `users` WHERE users.email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = mysqli_fetch_array($result)) {
                $firstName = htmlentities($row['firstName']);
                $lastName = htmlentities($row['lastName']);

                $doctorName = 'Лікар ' . $firstName . ' ' . $lastName . '.';
                echo '<script>';
                echo 'var doctorName = "' . $doctorName . '";localStorage.setItem("doctorName", doctorName);';
                echo '</script>';
                if ($row['active']) {
                    include './diagnozlistelement.php';
                } else {
                    include './loginresponse/notactive.php';
                }
            }

            $stmt->close();
        } else {
            include './loginresponse/nonautorization.php';
        }
        ?>
        </div>
        </div>
<footer>
  <div>©️ Lorem.com 2024</div>
  <a href="./navigation/about.php#connectUs">Підтримка</a>
</footer>
</body>
</html>