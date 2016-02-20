<?php
  function url($url) {
    global $base_url;
    return $base_url . $url;
  }

  function view($route) {
  	ob_start();
	require_once($route);
	$result = ob_get_contents();
	ob_end_clean();

	return $result;
  }