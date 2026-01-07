<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        return view('view_login');
    }

    public function postLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new ModelUser();

        $getUser = $userModel->where('username', $username)->first();

        //cek apakah ada
        if ($getUser == null) {
            session()->setFlashdata('pesan_gagal', 'Username tidak ditemukan');
            return redirect()->to(url_to('login'));
        }

        // jika password salah
        if (! password_verify($password, $getUser['password'])) {
            session()->setFlashdata('pesan_gagal', 'Password salah');
            return redirect()->to(url_to('login'));
        }

        $dataSession = [
            'is_loggedin' => true,
            'user_id' => $getUser['id'],
            'username' => $getUser['username'],
            'nama' => $getUser['nama']
        ];

        session()->set($dataSession);
    }
}
