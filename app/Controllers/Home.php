<?php

namespace App\Controllers;

use App\Models\UserModel; // Perbaiki huruf 'A' pada 'App'

class Home extends BaseController
{
    protected $auth;
    protected $session;
    protected $usermodel;

    public function __construct()
    {
        $this->auth = service('auth'); // Menggunakan service 'auth' jika sudah diimplementasikan
        $this->session = session();
        $this->usermodel = new UserModel();
    }

    public function index()
    {
        // Apakah user sudah login?
        if (!$this->auth->isLoggedIn()) {
            return redirect()->to('/home/signin');
        }

        // Tampilkan sidebar dan data pengguna
        $data['menu'] = $this->auth->getSidebarMenu();
        $data['user1'] = $this->usermodel->find(1);
        $data['user2'] = $this->usermodel->find(2);

        return view('main_page', $data);
    }

    public function signin()
    {
        return view('login_form');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $success = $this->auth->doLogin($username, $password);

        if ($success) {
            return redirect()->to('/dashboard');
        } else {
            $data['login_info'] = "Username atau password salah. Silakan masukkan kombinasi yang benar!";
            return view('login_form', $data);
        }
    }

    public function logout()
    {
        if ($this->auth->isLoggedIn()) {
            $this->auth->doLogout();
        }
        return redirect()->to('/login');
    }
}
