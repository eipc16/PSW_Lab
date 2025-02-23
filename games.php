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
  <title>Gry - RetroGames</title>
  <meta name="description" content="Lista z opisem starych gier">
  <meta name="author" content="Przemysław Pietrzak, Mateusz Pakuła">
  <meta name="keywords" content="retro, games, gry, old, stare, game, oldschool">

  <link rel="stylesheet" href="styles/main_stylesheet.css">
  <link rel="stylesheet" href="styles/navigation.css">
  <link rel="stylesheet" href="styles/games.css">

  <script src="scripts/gamedata.js"></script>
  <script src="scripts/tables.js"></script>
  <script src="scripts/collections.js"></script>
  <script src="scripts/navigation.js"></script>
</head>

<body>
  <nav>
    <div w3-include-html="navigation.php"></div>
  </nav>
  <h1><strong>Lista gier</strong></h1>

  <div class="flex-container">
    <script src="scripts/gamedata.js"></script>

    <div class="game-inputs">
      <label for="genre">Gatunek</label>
      <select id="genre" onChange='loadTypes(this.value)'></select>
      <label for="type">Rodzaj</label>
      <select id="type" onChange='updateTables()'></select>
      <label for="search">Nazwa</label>
      <input type="search" id="nameSearch" onChange='updateTables()'/>
   </div>

   <div id="table-container"></div>

   <div>
     <br><br><br><br>
       <label for="collection">Wybierz typ</label>
       <select id="collection">
         <option value="img">Obrazki</option>
         <option value="links">Linki</option>
         <option value="forms">Formularze</option>
         <option value="anchors">Anchors</option>
       </select>

       <label for="collection_index">Indeks elementu</label>
       <input type="number" id="collection_index"/>
       <button onclick="collection('index')">Wybierz</button>

       <label for="collection_id">Identyfikator elementu</label>
       <input type="text" id="collection_id"/>
       <button onclick="collection('id')">Wybierz</button>

   <div id="selected-holder"></div>
   </div>

  </div>
  <footer>
    <p>Copyright <strong>&copy; P & P, Inc. 2018.</strong> Wszelkie prawa zastrzeżone.</p>
  </footer>

  <script type="text/javascript">
    loadGenres();
    loadTypes();
    includeHTML();
  </script>
</body>

</html>
