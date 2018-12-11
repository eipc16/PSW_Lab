<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback - RetroGames</title>
  <meta name="description" content="Strona umożliwiająca wysłanie opinii.">
  <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
  <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

  <link rel="stylesheet" href="styles/main_stylesheet.css">
  <link rel="stylesheet" href="styles/navigation.css">

  <script src="scripts/navigation.js"></script>
  <script src="scripts/feedback.js"></script>
</head>

<body>
  <nav>
    <div w3-include-html="navigation.html"></div>
  </nav>

  <?php
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $_POST['phone'])){
      print('<p style="color:red;font-size:16pt;">Podany numer telefonu nie jest prawidłowy! Numer powinien miec format 111-222-444!</p>');
      die();
    }
  ?>

  <p style='font-size:16pt'>Witaj <strong><?php print($_POST['name'])  ?></strong><em>(
    <?php echo 'Adres IP: \'' . $_SERVER['REMOTE_ADDR'] . '\'' ?>)</em>.
    Bardzo dziękujemy Ci za wypełnienie ankiety!
    Będziemy na bieżąco informowac Cie o postepach pod adresem e-mail <strong><?php print($_POST['email'])?></strong>
    lub twoim numerem telefonu <strong><?php print($_POST['phone'])?></strong>!</p>

    <?php
    if (isset($_POST['checkboxes'])) {
      $results = $_POST['checkboxes'];
      for ($i = 0; $i < count($results) ; $i++){
        if($results[$i] == 'Design')
          print('<p style="color:blue;font-size:14pt;">Postaramy się naprawic wyglad naszej strony! Dziekujemy za opinie!</p>');
        elseif(strcmp($results[$i], "Content") == 0)
          print('<p style="color:darkgreen;font-size:14pt;">Postaramy sie dodac wiecej tresci do naszej strony! Dziekujemy za opinie!</p>');
      }
    } else {
      print('<p style="font-size:14pt;">Bardzo nasz cieszy, ze podoba Ci sie nasza strona!</p>');
    }
    ?>

    <footer>
      <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
    </footer>

    <script type="text/javascript">
      includeHTML();
    </script>
</body>
