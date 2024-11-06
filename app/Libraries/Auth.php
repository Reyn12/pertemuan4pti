<?php

namespace App\Libraries;

use App\Models\UserModel;

class Auth
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }

    // untuk validasi login 
    public function doLogin($username, $password)
    {
        // cek di database, ada atau tidak
        $user = $this->userModel->where('user_username', $username)
            ->where('user_password', md5($password)) // lebih baik menggunakan hashing modern seperti password_hash
            ->first();

        if (!$user) {
            // username dan password tidak ditemukan
            return false;
        } else {
            // user ditemukan, simpan informasi ke session
            $sessionData = [
                'user_id'   => $user['user_id'],
                'nama'      => $user['user_nama'],
                'alamat'    => $user['user_alamat'],
                'kota'      => $user['user_kota'],
                'kodepos'   => $user['user_kodepos'],
                'telepon'   => $user['user_telepon'],
                'email'     => $user['user_email'],
                'username'  => $user['user_username'],
                'role'      => $user['user_role'],
                'level'     => $user['user_level']
            ];
            $this->session->set($sessionData);
            return true;
        }
    }

    // untuk mengecek apakah user sudah login atau belum
    public function isLoggedIn()
    {
        return $this->session->has('user_id');
    }

    // untuk validasi di setiap halaman yang mengharuskan autentikasi 
    public function restrict()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/home');
        }
    }

    // untuk mengecek akses menu
    public function cekMenu($idMenu)
    {
        $statusUser = $this->session->get('level');
        $allowedLevel = $this->userModel->getArrayMenu($idMenu);

        if (!in_array($statusUser, $allowedLevel)) {
            throw new \RuntimeException("Maaf, Anda tidak berhak untuk mengakses halaman ini.");
        }
    }

    // untuk logout
    public function doLogout()
    {
        $this->session->destroy();
    }
}
