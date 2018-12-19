<?php
$servername = 'localhost';
$username = 'epicm';
$password = '0DR9aQlWPhQypCOA';
$dbname = 'Users2';

$database = mysqli_connect($servername, $username, $password);

$query = "DROP DATABASE $dbname";

if(!$database) {
  die('<p>Nie mogłem połączyć się z bazą!');
}

if (mysqli_query($database, $query)) {
  echo "Operacja przeprowadzona pomyślnie!<br>";
} else {
  die('Błąd podczas tworzenia bazy ' . mysqli_error($database));
}

mysqli_close($database);
?>