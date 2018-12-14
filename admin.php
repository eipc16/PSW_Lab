<!DOCTYPE html>

<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Strona główna - RetroGames</title>
  <meta name="description" content="Strona poświęcona wszystkim starym grom.">
  <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
  <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

  <link rel="stylesheet" href="styles/main_stylesheet.css">
  <link rel="stylesheet" href="styles/navigation.css">

  <script src="scripts/navigation.js"></script>
</head>

<body id='indexBody'>
  <nav>
    <div w3-include-html="navigation.php"></div>
  </nav>

  <script>
    includeHTML();
  </script>
</body>

<?php
  function isAdmin($database, $username) {
    $query = "SELECT id FROM account WHERE username='$username' AND is_admin=1";
    $result = mysqli_query($database, $query);

    if(mysqli_num_rows($result) > 0)
      return true;

    return false;
  }

  function printUserTable($data) {
    $html = "<table id='users'>"
            . "<tr>"
              . "<th>ID</th>"
              . "<th>Login</th>"
              . "<th>E-Mail</th>"
              . "<th>Imię</th>"
              . "<th>Nazwisko</th>"
              . "<th>Data urodzenia</th>"
              . "<th>Czy admin?</th>"
            . "</tr>";
    while($row = mysqli_fetch_row($data)){
      $html = $html
              . "<tr>"
                . "<td>$row[0]</td>"
                . "<td>$row[1]</td>"
                . "<td>$row[2]</td>"
                . "<td>$row[3]</td>"
                . "<td>$row[4]</td>"
                . "<td>$row[5]</td>"
                . "<td>" . ($row[6] == 1 ? "Tak" : "Nie") . "</td>"
              . "</tr>";
    }

    print($html);
  }

  session_start();

  if(!isset($_SESSION['user_id'])){
    header("Location: index.html");
  }

  $user = $_SESSION['user_id'];
  $database = mysqli_connect('localhost', 'epicm', '0DR9aQlWPhQypCOA');

  if(!mysqli_select_db($database, 'users')) {
    die('<p>Baza nie istnieje</p>');
  }

  if(isAdmin($database, $user)) {
    $query = "SELECT id, username, email, first_name, last_name, birth_date, is_admin FROM account ORDER BY id";
    $result = mysqli_query($database, $query);

    if($result) {
      print('<br><br><br><br><br>');
      printUserTable($result);
    }

  } else {
    header("Location: index.html");
  }

  mysqli_close($database);
?>
