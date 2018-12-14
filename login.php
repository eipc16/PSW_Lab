<?php
  session_start();

  function loginUser($username, $password) {
    $database = mysqli_connect('localhost', 'epicm', '0DR9aQlWPhQypCOA');

    $secret = '758fa765cc43c5d4ddcc245e512bb80d';
    $hash_password = hash_hmac('sha256',  $password, $secret);
    $query = "SELECT id FROM account WHERE username = '$username' AND password = '$hash_password'";

    if(!$database){
      die('<p>Nie mogłem połączyć się z bazą!');
    }

    if(!mysqli_select_db($database, 'users')) {
      die('<p>Baza nie istnieje</p>');
    }

    $result = mysqli_query($database, $query);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $username;
    }

    mysqli_close($database);
  }

  if(!empty($_POST)) {
    if(isset($_POST['action']) && $_POST['action'] == 'login' && isset($_POST['user']) && isset($_POST['password'])) {
      loginUser(quotemeta($_POST['user']), quotemeta($_POST['password']));
    } elseif(isset($_POST['action']) && $_POST['action'] == 'logout') {
      session_destroy();
    }
    header("Location: {$_POST['target']}");
  }
?>
