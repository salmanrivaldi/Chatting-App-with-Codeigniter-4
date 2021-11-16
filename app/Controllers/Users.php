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

  public function auth_login()
  {
    if ($this->request->isAJAX()) {
      $validation = [
        'email' => [
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => 'Email can\'t be blank',
            'valid_email' => 'Enter a valid email address'
          ],
        ],
        'password' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
            'required' => 'Password can\'t be blank',
            'min_length' => 'Password is too long (minimum is 6 characters)',
          ]
        ],
      ];

      if (!$this->validate($validation)) {
        $errors = [
          'email' => $this->validation->getError('email'),
          'password' => $this->validation->getError('password'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $dataUser = $this->userModel->where(['email' => $email,])->first();

      if (!$dataUser) {
        $output = [
          'status' => false,
          'errors' => [
            'email' => 'The email isn\'t registered'
          ]
        ];
        return json_encode($output);
      } else {

        if (password_verify($password, $dataUser->password)) {
          session()->set([
            'id' => $dataUser->id,
            'user_id' => $dataUser->user_id,
            'name' => $dataUser->name,
            'logged_in' => TRUE
          ]);

          $this->userModel->save([
            'id' => $dataUser->id,
            'status' => 'Online'
          ]);

          return json_encode(['status' => true]);
        } else {
          // if login fail
          $output = [
            'status' => false,
            'errors' => [
              'email' => 'Email & Password isn\'t match',
              'password' => 'Email & Password isn\'t match'
            ]
          ];
        }
        return json_encode($output);
      }
    }
  }

  public function register()
  {
    $data = [
      'title' => 'Registration',
      'js' => 'register.js'
    ];
    return view('register', $data);
  }

  public function auth_register()
  {
    if ($this->request->isAJAX()) {
      $validation = [
        'name' => [
          'rules' => 'required|max_length[20]',
          'errors' => [
            'required' => 'Name can\'t be blank',
            'max_length' => 'Name is too long (maximum is 20 characters)!'
          ]
        ],
        'email' => [
          'rules' => 'required|is_unique[users.email]|valid_email',
          'errors' => [
            'required' => 'Email can\'t be blank',
            'is_unique' => 'The Email has been used',
            'valid_email' => 'Enter a valid email address'
          ],
        ],
        'password' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
            'required' => 'Password can\'t be blank',
            'min_length' => 'Password is too long (minimum is 6 characters)',
          ]
        ],
        'img' => [
          'rules' => [
            'uploaded[img]',
            'mime_in[img,image/jpg,image/jpeg,image/png]',
            'max_size[img,1024]',
            'is_image[img]'
          ],
          'errors' => [
            'uploaded' => 'Image can\'t be blank',
            'max_size' => 'The image is too large',
            'is_image' => 'Upload a valid image',
            'mime_in' => 'Upload a valid image'
          ]
        ]
      ];

      if (!$this->validate($validation)) {
        $errors = [
          'name' => $this->validation->getError('name'),
          'email' => $this->validation->getError('email'),
          'password' => $this->validation->getError('password'),
          'img' => $this->validation->getError('img'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $imgFile = $this->request->getFile('img');

      if ($imgFile->getError() == 4) {
        $imgName = 'default.png';
      } else {
        $imgName = $imgFile->getRandomName();
        $imgFile->move('assets/images/user_image', $imgName);
      }

      $user_id = rand(time(), 100000000);
      $data = [
        'user_id' => $user_id,
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'img' =>  $imgName,
        'status' => "Online"
      ];

      $this->userModel->save($data);

      session()->set([
        'id' => $this->userModel->insertID(),
        'user_id' =>  $user_id,
        'name' => $this->request->getVar('name'),
        'logged_in' => TRUE
      ]);

      return json_encode(['status' => true]);
    }
  }

  public function logout()
  {
    $this->userModel->save([
      'id' => session()->get('id'),
      'status' => 'Offline'
    ]);
    session()->destroy();
    return redirect()->to('/');
  }

  public function get_contact()
  {
    $user_id = session()->get('user_id');
    $data = [
      'contacts' => $this->userModel->where('user_id !=', $user_id)->get()->getResult(),
    ];
    $output = view('partials/_contact', $data);
    return json_encode($output);
  }

    public function search_contact()
  {
    $keywordSearch = $this->request->getVar('keywordSearch');
    $user_id = session()->get('user_id');
    $data = [
      'contacts' => $this->userModel->where('user_id !=', $user_id)->like('name',$keywordSearch)->get()->getResult()
    ];
    $output = view('partials/_contact', $data);
    return json_encode($output);
    
  }
}
