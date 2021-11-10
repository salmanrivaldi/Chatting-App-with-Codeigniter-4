<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Login',
      'js' => 'login.js'
    ];

    return view('login', $data);
  }

  public function register()
  {
    $data = [
      'title' => 'Registration',
      'js' => 'register.js'
    ];

    return view('register', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact',
      'css' => 'contact.css',
      'js' => 'contact.js'
    ];

    return view('contact', $data);
  }

  public function chat()
  {
    $data = [
      'title' => 'Chat',
      'css' => 'chat.css',
      'js' => 'chat.js'
    ];

    return view('chat', $data);
  }
}
