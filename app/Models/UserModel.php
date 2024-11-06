<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_username', 'user_password', 'user_nama', 'user_alamat', 'user_kota', 'user_kodepos', 'user_telepon', 'user_email', 'user_role', 'user_level'];

    public function getMenuForLevel($userLevel)
    {
        return $this->db->table('menu')
            ->like('menu_allowed', '+' . $userLevel . '+')
            ->get()
            ->getResult();
    }

    public function getArrayMenu($id)
    {
        $result = $this->db->table('menu')
            ->select('menu_allowed')
            ->where('menu_id', $id)
            ->get()
            ->getRow();

        if ($result) {
            return explode('+', $result->menu_allowed);
        } else {
            throw new \RuntimeException("Menu not found for ID: $id");
        }
    }

    public function selectAll($idUser)
    {
        return $this->where('user_id', $idUser)->findAll();
    }
}
