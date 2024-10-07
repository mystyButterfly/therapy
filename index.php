<?php
include('./csp.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_COOKIE['device_id'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $YouLogin = true;
} else {
    $YouLogin = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lorem</title>
  <link rel="stylesheet" href="stylelogin.css">
  <link rel="shortcut icon" href="./imagesmain/icon.png" type="image/x-icon">
</head>

<body>
  <div id="confirmmodal" class="confirmmodal">
    <div class="confirmmodal-content">
      <img class="confirmlogo" src="./imagesmain/logo.png" alt="">
      <h3 class="confirmtext">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam aliquid nam vel quaerat praesentium repellendus ipsam sequi exercitationem animi necessitatibus dolore facilis laboriosam fugit, soluta ipsa est harum? Magnam dolor iure pariatur, voluptatibus fugit ipsam voluptate nemo aperiam corporis obcaecat similique optio voluptatibus quam nostrum ea praesentium enim quas. Incidunt a molestias voluptates nulla maiores sint facilis et adipisci tenetur ducimus.<a href="./pages/navigation/securitysmall.php">Ознайомитися з Угодою користувача</a></h3><br/>
      <button id="confirmBtn">Погоджуюся</button>
    </div>
  </div>

  <header>
    <div class="header-label">
      <a href="./index.php"><img class="header-image" src="./imagesmain/logo.png" alt="" /></a>
    </div>
    <a href="./pages/navigation/about.php">Про нас</a>
    <a href="./pages/navigation/howtouse.php">Як користуватися</a>
    <a href="./pages/navigation/news.php">Новини</a>
    <a href="./pages/navigation/price.php">Ціни</a>
    <a href="./pages/navigation/security.php">Угода користувача</a>
    <a href="#login-container">Вхід/реєстрація</a>
  </header>

  <div class="images">
    <div class="field terapy-field"><a href="./pages/diagnozlistpage.php">
        <h3>Therapy<br /><small>start working</small></h3>
      </a></div>
  </div>

  <div class="login-container" id="login-container">
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Реєстрація</h1>
      <form method="post" action="loginsystem/register.php">
        <div class="input-group">
          <input type="text" name="fName" id="fName" placeholder="Ім'я" required>
        </div>
        <div class="input-group">
          <input type="text" name="lName" id="lName" placeholder="Прізвіще" required>
        </div>
        <div class="input-group">
          <input type="email" name="email" id="email" placeholder="Електронна пошта" required>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="password" style="font-size: 12px; margin-bottom: 10px;" placeholder="ПАРОЛЬ (краще від 8 символів, можна менший)" required>
        </div>
        <input type="submit" class="btn" value="Реєстрація" name="signUp">
      </form>

      <div class="links" id="linksIn">
        <p>Вже є акаунт?</p>
        <button id="signInButton">Увійти</button>
      </div>
    </div>

    <div class="container" id="signIn">
      <h1 class="form-title">Увійти</h1>
      <form method="post" action="loginsystem/register.php">
        <div class="input-group">
          <input type="email" name="email" id="email" placeholder="Електронна пошта" required>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="password" placeholder="Пароль" required>
        </div>
        <p class="recover">
          <a href="./pages/navigation/about.php#connectUs">Відновити пароль</a>
        </p>
        <input type="submit" class="btn" value="Увійти" name="signIn">
      </form>
      <div class="links">
        <p>Ще немає акаунта?</p>
        <button id="signUpButton">Зареєструватися</button>
      </div>
    </div>
  </div>

  <footer>
    <div>©️ Lorem.com 2024</div>
    <a href="./pages/navigation/about.php#connectUs">Підтримка</a>
  </footer>

  <script src="scriptlogin.js"></script>
<script>
  if (<?php echo $YouLogin ? 'true' : 'false'; ?>) {document.getElementById("signIn").innerHTML = '<a class="logOutIndex" href="./loginsystem/logout.php">Ви зараз у системі. Вихід</a>';
    signUpForm.style.display="block";
    document.getElementById("signIn").style.textAlign="center";
    document.getElementById("linksIn").style.display="none";
  }
</script>
  
</body>

</html>