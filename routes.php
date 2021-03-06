<?php
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
        break;
      default:
        $name = ucfirst($controller) . 'Controller';
        $controller = new $name;
    }

    // call the action
    return $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array(
    'pages' => ['home', 'error', 'about'], 
    'users' => ['login', 'logout'],
    'auth' => ['login', 'logout']
  );

  $global_content = '';

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      $global_content = call($controller, $action);
    } else {
      $global_content = call('pages', 'error');
    }
  }

  if (!$global_content) {
    $global_content = call('pages', 'error');
  }