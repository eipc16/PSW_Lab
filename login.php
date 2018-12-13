<?php
session_start();

$user = 'root';
$password = 'root';

if(!empty($_POST)) {
  if(isset($_POST['action']) && $_POST['action'] == 'login' && isset($_POST['user']) && isset($_POST['password'])) {
      if($_POST['user'] == $user && $_POST['password'] == $password){
        $_SESSION['user_id'] = $user;

      }
  } elseif(isset($_POST['action']) && $_POST['action'] == 'logout') {
    session_destroy();
  }
  header("Location: {$_POST['target']}");
}
?>
