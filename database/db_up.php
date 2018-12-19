<?php
function runQuery($database, $query) {
    if(!$database) {
        die('<p>Nie mogłem połączyć się z bazą!');
    }

    if (mysqli_query($database, $query)) {
        echo "Operacja przeprowadzona pomyślnie!<br>";
    } else {
        die('Błąd podczas tworzenia bazy ' . mysqli_error($database));
    }

}

$servername = 'localhost';
$username = 'epicm';
$password = '0DR9aQlWPhQypCOA';
$dbname = 'Users2';

$database = mysqli_connect($servername, $username, $password);

$query = "DROP DATABASE IF EXISTS $dbname";
runQuery($database, $query);
$query = "CREATE DATABASE $dbname";
runQuery($database, $query);

if(!mysqli_select_db($database, $dbname)) {
    die('<p>Baza nie istnieje</p>');
}

$query = "
CREATE TABLE Account (
    ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    USERNAME varchar(40) NOT NULL UNIQUE,
    PASSWORD varchar(255) NOT NULL,
    FIRST_NAME varchar(40) DEFAULT NULL,
    LAST_NAME varchar(40) DEFAULT NULL,
    BIRTH_DATE date DEFAULT NULL,
    EMAIL varchar(60) NOT NULL UNIQUE,
    IS_ADMIN tinyint(1) NOT NULL
)";
runQuery($database, $query);

for($i = 0; $i < 10; $i++) {
    $query = "
    INSERT INTO `account` (`ID`, `USERNAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `BIRTH_DATE`, `EMAIL`, `IS_ADMIN`)
        VALUES(NULL, 'Adam_`$i`', 'adam312', 'Adam_`$i`', 'Nowak', '1990-12-30', 'adam_`$i`@wp.pl', '0')";
    runQuery($database, $query);
}

mysqli_close($database);
?>