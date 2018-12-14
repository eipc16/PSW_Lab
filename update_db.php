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

<body>
  <nav>
    <div w3-include-html="navigation.php"></div>
  </nav>

  <script>
    includeHTML();
  </script>
</body>
<?php
  session_start();

  function updateDatabase($database, $validated_data) {
    $secret = '758fa765cc43c5d4ddcc245e512bb80d';

    $login = quotemeta($validated_data['login']);
    $email = quotemeta($validated_data['email']);
    $password = hash_hmac('sha256',  quotemeta($validated_data['password']), $secret);
    $first_name = quotemeta($validated_data['first_name']);
    $last_name = quotemeta($validated_data['last_name']);
    $birth_date = quotemeta($validated_data['birth_date']);

    $select_query = "SELECT id FROM account WHERE username = '$login'";

    if(mysqli_num_rows(mysqli_query($database, $select_query)) > 0 && !($_SESSION['user_id'] == $login)) {
        die('Użytkownik znajduje się już w bazie!');
    }

    if(isset($_SESSION['user_id'])) {
      $username = $_SESSION['user_id'];
      $update_query = "UPDATE account
                       SET username = '$login', password = '$password', first_name = '$first_name',
                           last_name = '$last_name', birth_date = '$birth_date', email = '$email'
                       WHERE username = '$username'";
      $_SESSION['user_id'] = $login;
    } else {
      $update_query = "INSERT INTO account (id, username, password, first_name, last_name, birth_date, email)
                       VALUES (NULL, '$login', '$password', '$first_name', '$last_name', '$birth_date', '$email')";
    }

    if(!mysqli_query($database, $update_query)) {
        print('<h1>Nie mogłem dodać/zaktualizować danych</h1>');
        die(mysqli_error($database));
    }
  }

  function validateData($data) {
    $errors = array('login_err' => false, 'email_err' => false, 'password_err' => false);

    if(strlen($data['login']) < 6 || !preg_match('/[\da-zA-Z]/', $data['login'])){
      $errors['login_err'] = true;
    }

    if(!preg_match('/[\da-zA-Z]@[\da-zA-Z\.]/', $data['email'])){
      $errors['email_err'] = true;
    }

    if(strlen($data['password']) < 5){
      $errors['password_err'] = true;
    }

    return $errors;
  }

  function getUserData($database, $username) {
    $select_query = "SELECT username, email, first_name, last_name, birth_date FROM account WHERE username = '$username'";
    $result = mysqli_query($database, $select_query);

    return $result;
  }

  $input_list = array(
    'login' => "Login",
    'email' => "E-mail",
    'password' => "Haslo",
    'first_name' => "Imie",
    'last_name' => "Nazwisko",
    'birth_date' => "Data urodzenia");

  $database = mysqli_connect('localhost', 'epicm', '0DR9aQlWPhQypCOA');

    if(!$database || !mysqli_select_db($database, 'users')){
      die('Nie można połączyć się z bazą danych!');
  }

  if(!empty($_POST)) {
    if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['birth_date'])){
      $data = array(
        'login' => $_POST['login'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birth_date' => $_POST['birth_date']);

      $err_array = validateData($data);
      $errors = 0;

      foreach($err_array as $key=>$val){
        if($val == true) {
          $errors += 1;
        }
      }

      if($errors < 1) {
        updateDatabase($database, $data);
      } else {
        if($err_array['password_err'] == true)
          print("<p class = error>Nieprawidłowe hasło!</p>");
        if($err_array['login_err'] == true)
          print("<p class = error>Nieprawidłowy login!</p>");
        if($err_array['email_err'] == true)
          print("<p class = error>Nieprawidłowy email!</p>");
      }
    }
  }

  print('<h1>Dane użytkownika</h1>
         <p>Prosze wpisz wszystkie pola i kliknij Zarejestruj\Zapisz</p>');

  $user_data = NULL;

  if(isset($_SESSION['user_id'])) {
    $user_data = mysqli_fetch_object(getUserData($database, $_SESSION['user_id']));
  }

  mysqli_close($database);

  $login = $user_data != NULL ? $user_data->username : "";
  $email = $user_data != NULL ? $user_data->email : "";
  $password = "";
  $first_name = $user_data != NULL ? $user_data->first_name : "";
  $last_name = $user_data != NULL ? $user_data->last_name : "";
  $birth_date = $user_data != NULL ? $user_data->birth_date : "";

  $submit = isset($_SESSION['user_id']) ? "Zapisz" : "Zarejestruj";

  print("<form method = 'post' action='update_db.php'>");
  foreach($input_list as $inputname => $inputmessage) {
    $html = "<div><label>$inputmessage:</label><input type='";
    if($inputname == 'birth_date') {
      $html = $html . "date";
    } elseif($inputname == 'password') {
      $html = $html . "password";
    } else {
      $html = $html . "text";
    }
    $html = $html . "' name = '$inputname' value = '" . $$inputname. "'/></div>";
    print($html);
  }
  print("<input type='submit' value='$submit'/>");
?>
