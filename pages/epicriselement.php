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
    <h2 class="underline">Lorem</h2>
  </a>
  <a class="settingProfileLink" href="./profile.php">
    <h2><img class="settingProfile" src="../imagesmain/setting.png" />Profile</h2>
  </a>
  <a href="./diagnozlistpage.php">
    <div>Back</div>
  </a>
</div>
<br />

<div class="getRecept">

  <?php
  $email = $conn->real_escape_string($_SESSION['email']);
  $sql = "SELECT * FROM articles where articles.email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<div class='receptTitle'>Рецепт: " . htmlspecialchars($row["title"]) . "</div>";
      echo '<div class="receptContainer"> Препарати:' . '<div  class="addReceptSelector" onclick="addToReceptArray.call(this); this.classList.add(`disabled`);">' . htmlspecialchars($row["article"]) . "</div></div><br>";
    }
  } else {
    echo "<div class='greating'>Збережених рецептів ще не має. Створіть рецепти у вкладці Профіль</div>";
  }

  $conn->close();
  ?>
</div>


<h2 class="js-logic">[Here was javaScript logic]</h2>