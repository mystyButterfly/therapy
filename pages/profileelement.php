<a class="goOut" href="../loginsystem/logout.php">Вийти</a>

<div class="chose-variant">
  <h3>Оберіть розділ:</h3>
  <a href="./homepage.php">
    <h2>Lorem</h2>
  </a>
  <a href="./daylog.php">
    <h2>Lorem</h2>
  </a>
  <a href="./epicris.php">
    <h2>Lorem</h2>
  </a>
  <a class="settingProfileLink" href="./profile.php">
    <h2 class="underline"><img class="settingProfile" src="../imagesmain/setting.png"/>Profile</h2>
  </a>
  <a href="./diagnozlistpage.php"><div>Main menu</div></a>
</div>
<br /><br />
<div class="getCity">
  <div>
    
    <div><?php
          if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $stmt = $conn->prepare("SELECT users.* FROM `users` WHERE users.email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
              echo htmlspecialchars($row['city']);
            }

            $stmt->close();
          }
          ?>
    </div>
  </div>
  <form method="post" action="./profilesetting/savecity.php">
    <label for="city">Add information.</label><br>
    <input type="text" id="city" name="city"><br><br>
    <input type="submit" value="Add" class="savecity">
  </form>
</div>


<div class="addRecept getCity">
<h1>Lorem, ipsum.</h1>
<form method="post" action="./profilesetting/saverecept.php">
  <label for="title">Назва рецепту:</label><br>
  <input type="text" id="title" name="title"><br><br>

  <label for="article">Препарати:</label><br>
  <textarea id="article" name="article"></textarea><br><br>

  <input type="submit" value="Додати" class="savecity">
</form>
<br/><br/>
<hr/><br/>

<?php
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM articles where articles.email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "Рецепт: " . htmlspecialchars($row["title"]) . "<br>";
    echo "Препарати: " . htmlspecialchars($row["article"]) . "<br>";
    echo "<a href='./profilesetting/delete_article.php?id=" . $row["id"] . "'>Видалити</a><br><br>";
  }
} else {
  echo "Ще немає рецептів.";
}

$stmt->close();
$conn->close();

?>
</div>