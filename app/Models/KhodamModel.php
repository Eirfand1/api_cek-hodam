<?php

namespace App\Models;

use CodeIgniter\Model;

class KhodamModel extends Model
{
    protected $table            = 'khodams';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_khodam', 'deskripsi'];
    protected $useTimestamp     = true;

    public function getKhodam(){
       return $this->orderBy('RAND()')->first();
    }
    
}
