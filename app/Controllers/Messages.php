<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Messages extends BaseController
{

  public function contact()
  {
    $user_id = session()->get('user_id');
    $data = [
      'title' => 'Contact',
      'contacts' => $this->userModel->where('user_id !=', $user_id)->get()->getResult(),
      'user' => $this->userModel->where(['user_id' => $user_id])->first(),
      'css' => 'contact.css',
      'js' => 'contact.js'
    ];

    // dd(session()->get());
    return view('contact', $data);
  }

  public function chat($user_id)
  {
    $data = [
      'other_user' => $this->userModel->where(['user_id' => $user_id])->first(),
      'title' => 'Chat',
      'css' => 'chat.css',
      'js' => 'chat.js'
    ];
    return view('chat', $data);
  }

  public function send_chat()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'sender_id' => session()->get('user_id'),
        'receiver_id' => $this->request->getVar('receiver_id'),
        'message' => $this->request->getVar('message'),
      ];
      $this->messageModel->save($data);
    } else {
      return redirect('/');
    }
  }

  public function get_chat()
  {
    if ($this->request->isAJAX()) {
      $receiver_id = $this->request->getVar('receiver_id');
      $data['messages'] = $this->messageModel->get_chat($receiver_id);
      $output = view('partials/_chat-box', $data);
      return json_encode($output);
    } else {
      return redirect('/');
    }
  }
}
