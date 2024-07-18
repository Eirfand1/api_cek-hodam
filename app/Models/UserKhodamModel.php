<?php

namespace App\Models;

use CodeIgniter\Model;

class UserKhodamModel extends Model
{
    protected $table            = 'userkhodams';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'khodam_id'];
    protected $useTimestamp     = true;    

    public function getUserKhodam($userId){
        // Mengembalikan objek table khodam dimana dengan user id yg diminta 
        $result =  $this->select('khodams.*')
                    ->join('khodams', 'khodams.id = userkhodams.khodam_id')
                    ->where('userkhodams.user_id', $userId)
                    ->first();        
        
        return $result;

    }
    
}
