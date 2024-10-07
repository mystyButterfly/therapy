<?php
include('../csp.php');
session_start();
include("../loginsystem/connect.php");

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
    <?php if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];

                            $stmt = $conn->prepare("SELECT users.* FROM `users` WHERE users.email=?");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                $city = htmlspecialchars($row['city']);
                                include './epicriselement.php';
                            }
                        }
                        ?></div>

</div><footer>
  <div>©️ Lorem.com 2024</div>
  <a href="./navigation/about.php#connectUs">Підтримка</a>
</footer>
    <script>
        var city = '<?php echo htmlspecialchars($city, ENT_QUOTES, 'UTF-8'); ?>';
        localStorage.setItem('city', city);
    </script>
</body>

</html>