<?php
  class UsersController {
    public function login() {
      if(!empty($_POST['username']) && !empty($_POST['password'])) {
        // let the user login
        $username = strip_tags($_POST['username']);
        // $password = md5(mysql_real_escape_string($_POST['password']));

        $_SESSION['Username'] = $username;
        $_SESSION['LoggedIn'] = 1;

        header('Location: ' . url('/'));
      }

      if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
        // user is logged in, so redirect to somewhere else
        header('Location: ' . url('/'));
      }
      
      return view('views/users/login.php');
    }

    public function logout() {
      $_SESSION = array(); 
      session_destroy();
      header('Location: ' . url('/login'));
      exit();
    }
  }