<?php
  define('EXPIRE_TIME', 60 * 60 * 24 * 5);

  $style = array("#e6e2d3", "black", "14px");

  if (isset($_COOKIE['background_color']) && isset($_COOKIE['text_color']) && isset($_COOKIE['text_size'])){
    $style = array($_COOKIE['background_color'], $_COOKIE['text_color'], $_COOKIE['text_size']);
  }
  if (isset($_POST['background_color']) && isset($_POST['text_color']) && isset($_POST['font_size'])){
    $style = array($_POST['background_color'], $_POST['text_color'], $_POST['font_size']);
    setcookie("background_color", $style[0], time() + EXPIRE_TIME, '/');
    setcookie("text_color", $style[1], time() + EXPIRE_TIME, '/');
    setcookie("text_size", $style[2], time() + EXPIRE_TIME, '/');
  }
?>

<!DOCTYPE html>

<html lang="pl">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gra - RetroGames</title>
    <meta name="description" content="Strona poświęcona wszystkim starym grom.">
    <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
    <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

    <link rel="stylesheet" href="styles/main_stylesheet.css">
    <link rel="stylesheet" href="styles/navigation.css">
    <link rel="stylesheet" href="styles/simplegame.css">

    <script src="scripts/navigation.js"></script>
    <script src="scripts/simplegame.js"></script>
  </head>

  <body id="indexBody" class="gameBody" onmousedown="isKeyPressed(event);savePosition(event);" onmousemove="updatePosition(event)">
  <nav>
    <div w3-include-html="navigation.php" id="navgame"></div>
  </nav>
  <br><br>

  <form class="style-switch" name='preferences' method="post">
    <label for="backgroundcolor">Kolor tła</label>
    <select id="backgroundcolor" name="background_color" onChange='setStyle()'>
      <option value="#e6e2d3" <?php if("#e6e2d3" == $style[0]) echo 'selected';?>>Domyślny</option>
      <option value="lightblue" <?php if("lightblue" == $style[0]) echo 'selected';?>>Niebieskie</option>
      <option value="lightgreen" <?php if("lightgreen" == $style[0]) echo 'selected';?>>Zielony</option>
    </select>
    <label for="fontcolor">Kolor tekstu</label>
    <select id="fontcolor" name="text_color" onChange='setStyle()'>
      <option value="black"<?php if("black" == $style[1]) echo 'selected';?>>Czarny</option>
      <option value="red"<?php if("red" == $style[1]) echo 'selected';?>>Czerwony</option>
      <option value="green"<?php if("green" == $style[1]) echo 'selected';?>>Zielony</option>
    </select>
    <label for="fontsize">Rozmiar czcionki</label>
    <select id="fontsize" name="font_size" onChange='setStyle()'>
      <option value="14px" <?php if("14px" == $style[2]) echo 'selected';?>>Domyślny</option>
      <option value="12px" <?php if("12px" == $style[2]) echo 'selected';?>>Mały</option>
      <option value="16px" <?php if("16px" == $style[2]) echo 'selected';?>>Duży</option>
    </select>
    <input type="submit" value="Zapisz"/>
  </form>

  <div class="game-body2">
    <br><br>
    <button id="colorButton" onclick="switchParentColor(this)">Kliknij mnie, aby zmienic kolor rodzica!</button>
    <br>

    <p>Obecna pozycja myszki</p>
    <div id='mousetracker'></div>
    <p>Zapisane pozycje</p>
    <div id="mouse-history"></div>
  </div>

  </div>
  <script>
    includeHTML();
    setStyle();
  </script>
  </body>

</html>
