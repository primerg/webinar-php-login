<?php
  session_start();
  require_once('config.php');
  require_once('connection.php');
  require_once('helpers.php');

  $request_uri = $_SERVER[ 'REQUEST_URI' ];
  $current_uri = str_replace($base_url, '', $request_uri);
  
  $controller = '';
  $action     = '';
  switch ($current_uri) {
    case '/':
      $controller = 'pages';
      $action     = 'home';
      break;

    case '/about':
      $controller = 'pages';
      $action = 'about';
      break;

    case '/login':
      $controller = 'users';
      $action = 'login';
      break;

    case '/logout':
      $controller = 'users';
      $action = 'logout';
      break;
  }

  require_once('routes.php');
  require_once('views/layout.php');

  