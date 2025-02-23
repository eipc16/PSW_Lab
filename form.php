<?php
  session_start();
  
  if(!isset($_SESSION['user_id'])){
    header("Location: index.html");
  }
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formularz - RetroGames</title>
  <meta name="description" content="Formularz">
  <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
  <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

  <link rel="stylesheet" href="styles/main_stylesheet.css">
  <link rel="stylesheet" href="styles/navigation.css">

  <script src="scripts/navigation.js"></script>
</head>

<body>
  <nav>
    <div w3-include-html="navigation.php"></div>
  </nav>

  <section>
    <h2><strong>Wypełnij powyższy formularz, aby zapisać się do naszego NEWSLETTERa!</strong></h2>
    <form action="form2.html" autocomplete='on'>
      Imię: <input type="text" name="fname" autofocus> (np. Adam)<br><br>
      Nazwisko: <input type="text" name="lname" required> (np. Nowak)<br><br>
      Miesiąc urodzin: <input type="text" value="" list="months">
      <datalist id="months">
        <option value="Styczeń"></option>
        <option value="Luty"></option>
        <option value="Marzec"></option>
        <option value="Kwiecień"></option>
        <option value="Maj"></option>
        <option value="Czerwiec"></option>
        <option value="Lipiec"></option>
        <option value="Sierpień"></option>
        <option value="Wrzesień"></option>
        <option value="Październik"></option>
        <option value="Listopad"></option>
        <option value="Grudzien"></option>
      </datalist> (np. Luty) <br><br>
      E-mail: <input type="email" name="email" required> (np. adam.nowak@gmail.com) <br><br>
      Tel.: <input type="tel" name="tel" pattern="^[1-9]\d{2}-\d{3}-\d{3}$"> np. (123-456-789)<br><br>

      <input type="submit" name="submit"><br><br><br>
    </form>
  </section>
  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
    includeHTML();
  </script>
</body>

</html>
