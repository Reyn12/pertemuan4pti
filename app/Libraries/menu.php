<?php

namespace App\Libraries;

use app\Models\UserModel;

class menu
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session(); // Mendapatkan instance session
    }

    public function tampilSidebar()
    {
        // Level untuk user ini
        $level = $this->session->get('level');

        // Ambil menu dari database sesuai dengan level
        $data['menu'] = $this->userModel->getMenuForLevel($level);
        $data['level'] = $level;

        // Tampilkan halaman sidebar dengan data menu
        return view('sidebar-nav', $data); // Menampilkan view secara langsung
    }
}
