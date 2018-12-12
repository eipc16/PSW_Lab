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
<form class="login" method="post" action="login.php" <?php if(isset($_SESSION['user_id'])) echo 'hidden';?>>
  <input type="hidden" name="target" value="index.html" />
  <input type="hidden" name="action" value="login"/>
  <input type="text" name="user"/>
  <input type="password" name="password"/>
  <input type="submit" value="Zaloguj się!"/>
</form>
<form class="login" method="post" action="login.php" <?php if(!isset($_SESSION['user_id'])) echo 'hidden';?>>
  <input type="hidden" name="target" value="index.html" />
  <input type="hidden" name="action" value="logout"/>
  <div>Użytkownik: <?php echo $_SESSION['user_id'] ?> </div><br>
  <input type="submit" value="Wyloguj się!"/>
</form>

</html>
