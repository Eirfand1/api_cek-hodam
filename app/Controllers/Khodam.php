<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\KhodamModel;
use App\Models\UserKhodamModel;

class Khodam extends ResourceController  
{
    use ResponseTrait;
    public function create()
    {
        try {
            $nama = $this->request->getVar('nama');
            
            $userModel = new UserModel();
            $khodamModel = new KhodamModel();
            $userKhodamModel = new UserKhodamModel();
            
            // Membuaut nama atau mengambil nama
            $user = $userModel->getOrCreateUser($nama);
            
            
            // Errornya disini anjenggg, jika datanya baru bakal error
            // Tapi berhasil masuk ke databasenya
            
            // Ini berlaku jika nama sudah ada
            // Ini error anjeng

            $khodam = $userKhodamModel->getUserKhodam($user['id']);
            if(!$khodam){
                $khodam = $khodamModel->getKhodam();
                $userKhodamModel->insert([
                    'user_id' => $user['id'],
                    'khodam_id' => $khodam['id']
                ]);
            }
            
            
            // Kalo $khodam hasilnya null atau false bakal insert
            
            
            // Data json yang akan dikembalikan
            $response = [
                'nama' => $user['nama'],
                'khodam' => $khodam['nama_khodam'],
                'deskripsi' => $khodam['deskripsi']
            ];
            
            return $this->respond($response, 200);
            
        } catch (\Exception $e) {
            log_message('error', 'Error in Khodam controller: ' . $e->getMessage());
            return $this->fail($e->getMessage());
        } 
    }
}
