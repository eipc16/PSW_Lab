<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<a href="index.html">
  <img src="buttons/start.png" id="start" alt="Start">
</a>
<a href="main.html">
  <img src="buttons/home.png" id="main" alt="Main Page">
</a>
<a href="games.php" <?php if(!isset($_SESSION['user_id'])) echo 'hidden'; ?>>
  <img src="buttons/games.png" id="games" alt="List of games">
</a>
<a href="feedback.html">
  <img src="buttons/feedback.png" id="feedback" alt="Feedback page">
</a>
<a href="form.php" <?php if(!isset($_SESSION['user_id'])) echo 'hidden'; ?>>
  <img src="buttons/newsletter.png" id="form" alt="Newsletter page">
</a>
<a href="about.html">
  <img src="buttons/about.png" id="about" alt="Something about us">
</a>
<div id="login">
<form method="post" class="table" action="login.php" <?php if(isset($_SESSION['user_id'])) echo 'hidden';?>>
  <input type="hidden" name="target" value="index.html" />
  <input type="hidden" name="action" value="login"/>
  <div class="tableRow">
    <input type="text" name="user"/>
    <input class="navbutton" type="submit" value="Zaloguj się!"/>
  </div>
  <div class="tableRow">
    <input type="password" name="password"/>
    <a href="update_db.php"><input class="navbutton" type="button" value="Zarejestruj się!"/></a>
  </div>
</form>
<form method="post" class="table" action="login.php" <?php if(!isset($_SESSION['user_id'])) echo 'hidden';?>>
  <input type="hidden" name="target" value="index.html" />
  <input type="hidden" name="action" value="logout"/>
  <div>Użytkownik: <?php echo $_SESSION['user_id'] ?> </div><br>
  <input class="navbutton"  type="submit" value="Wyloguj się!"/>
  <a href="update_db.php"><input class="navbutton" type="button" value="Zarządzaj kontem!"/></a>
</form>
</div>
</html>
