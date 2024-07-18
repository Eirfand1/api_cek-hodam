<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama'];
    protected $useTimestamp     = true;

    public function getOrCreateUser($nama){

        // Mengembalikan nama
        $user = $this->where('nama', $nama)->first();
        if(!$user){
            $this->insert(['nama' => $nama]);
            $user = $this->where('nama', $nama)->first();
        }
        return $user;
    }    
}
