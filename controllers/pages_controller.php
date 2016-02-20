<?php
  require_once('models/page.php');

  class PagesController {
    public function home() {
      return view('views/pages/home.php');
    }

    public function about() {
      return view('views/pages/about.php');
    }

    public function error() {
      return view('views/pages/error.php');
    }
  }