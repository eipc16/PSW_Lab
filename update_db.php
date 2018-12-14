<?php
  session_start();

  $secret = '758fa765cc43c5d4ddcc245e512bb80d';

  function updateDatabase($validated_data) {
    $login = quotemeta($validated_data['login']);
    $email = quotemeta($validated_data['email']);
    $password = hash_hmac('sha256',  quotemeta($validated_data['password']), $secret);
    $first_name = quotemeta($validated_data['first_name']);
    $last_name = quotemeta($validated_data['last_name']);
    $birth_date = quotemeta($validated_data['birth_date']);

    $database = mysqli_connect('localhost', 'epicm', '0DR9aQlWPhQypCOA');

    if(!$database || !mysqli_select_db($database, 'users')){
      return 2;
    }

    $select_query = "SELECT id FROM account WHERE username = '$login' OR email = '$email'";

    if(mysqli_num_rows(mysqli_query($database, $select_query)) > 0) {
        die('Użytkownik znajduje się już w bazie!');
    }

    if(isset($_SESSION['user_id'])) {
      $username = $_SESSION['user_id'];
      $update_query = "UPDATE account
                       SET username = '$login', password = '$password', first_name = '$first_name',
                           last_name = '$last_name', birth_date = '$birth_date', email = '$email'
                       WHERE username = '$username'";
    } else {
      $update_query = "INSERT INTO account (id, username, password, first_name, last_name, birth_dat, email)
                       VALUES (NULL, '$login', '$password', '$first_name', '$last_name', '$birth_date', '$email')";
    }

    if(!mysqli_query($database, $update_query)) {
        print('<h1>Nie mogłem dodać/zaktualizować danych</h1>');
        die(mysqli_error());
    }

    return 1;
  }

  function validateData($data) {
    $errors = array('login_err' => false, 'email_err' => false, 'password_err' => false);

    if(strlen($data['login'] < 6 || !preg_match('/[\da-zA-Z]/', $data['login']))){
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

  if(!empty($_POST)) {
    if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['birth_date']))
      $data = array(
        'login' => $_POST['login'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birth_date' => $_POST['birth_date']);

      $err_array = validateData($data);
      $errors = 0;
      $result = 0;

      foreach($err_array as $key => $value) {
        if($value == true) {
          $errors += 1;
          if($key == 'login_err') {
            echo 'Nieprawidłowy login!';
          } elseif($key == 'email_err') {
            echo 'Nieprawidłowy adres email!';
          } elseif($key == 'password_err') {
            echo 'Nieprawidłowe hasło';
          }
        }
      }

      if($errors == 0) {
        $result = updateDatabase($data);
      }

      if(result == 0) {
        header('Location: index.html');
      } elseif(result == 1) {
        echo 'Użytkownik znajduje się już w bazie!';
      } elseif(result == 2) {
        echo 'Nie można połączyć się z bazą!';
      } else {
        echo 'Nie mozna zaktualizowac/dodac danych!';
      }
  }
?>
