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
    <div w3-include-html="navigation.php"></div>
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
      $string_design = "<p style=\"color:blue;font-size:14pt;\">Postaramy się naprawic wyglad naszej strony! Dziekujemy za opinie!</p>";
      $string_content = "<p style=\"color:darkgreen;font-size:14pt;\">Postaramy sie dodac wiecej tresci do naszej strony! Dziekujemy za opinie!</p>";
      $response = array("bad_design"=>$string_design, "bad_content"=>$string_content);
      foreach ($results as $val) {
        if($val == 'Design')
          echo $response['bad_design'];
        elseif(strcmp($val, 'Content') == 0)
          echo $response['bad_content'];
      }
    } else {
      echo '<p style="font-size:14pt;">Bardzo nasz cieszy, ze podoba Ci sie nasza strona!</p>';
    }
    ?>

    <p style='font-size:16pt'>Twoja szczęśliwa liczba:
      <?php
      $numbers = explode("-", $_POST['phone']);
      for ($i = 0; $i < count($numbers); $i++){
          echo $numbers[$i];
          if($i < count($numbers) - 1)
            if($i % 2 == 0)
              echo ' + ';
            else {
              echo ' * ';
            }
          else {
            echo ' = ';
          }
      }
      $sum = $numbers[0] + $numbers[1] * $numbers[2];;
      echo $sum;
      ?>.</p>
      <p style='font-size:16pt'><?php
      define('LIMIT', 100000);
      $diff = abs($sum - LIMIT);
      $msg = "To więcej niż " . LIMIT . ", aż o  $diff";
      $patterns = array('/więcej/', '/aż/', '/ o /');
      $replacement = array('mniej', 'brakuje', ' ');
      if($sum < LIMIT){
        $msg = preg_replace($patterns, $replacement, $msg);
      }
      echo $msg;

      $result = LIMIT / $diff;
      echo '<br><br><br>' . LIMIT . " / " . $diff . " = " . $result . ' (' . gettype($result) . ')';
      echo '<br>' . LIMIT . " / " . $diff . " = " . (integer)$result . ' (rzutowanie na integer)';
      settype($result, 'integer');
      echo '<br>' . LIMIT . " / " . $diff . " = " . $result . ' (' . gettype($result) . ')';
      ?></p><br><br>


      <?php
      $continents = array("Afryka", "Ameryka Południowa", "Ameryka Północna", "Antarktyda", "Australia", "Eurazja");
      echo "<p>Kontynenty:<br>";
      do {
        echo current($continents) . "<br>";
      } while(next($continents) != NULL);
      echo "</p>";
      reset($continents);
      echo "<p>Kontynenty, których nazwa składa się z dwóch części:<br>";
      do {
        if(count(explode(" ", current($continents))) > 1)
          echo current($continents) . "<br>";
      } while(next($continents) != NULL);
      ?>

    <footer>
      <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
    </footer>

    <script type="text/javascript">
      includeHTML();
    </script>
</body>
