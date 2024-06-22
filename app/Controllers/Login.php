<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = (string)  $this->request->getPost('password');

        $check = $this->db->table('admin')->where('username', $username)->get()->getRowArray();

        if ($check) {
            $verify = password_verify($password, $check['password']);

            if ($verify) {
                session()->set([
                    'id' => $check['id'],
                    'username' => $check['username'],
                    'isLoggedIn' => true,
                    'type' => $check['type']
                ]);

                return redirect()->to(base_url('Panel'))->with('type-status', 'info')
                    ->with('message', 'Selamat Datang Kembali ' . $check['username']);
            }

            return redirect()->to(base_url('Login'))->with('type-status', 'error')
                ->with('message', 'Maaf password yang dimasukkan salah!');
        }

        return redirect()->to(base_url('Login'))->with('type-status', 'error')
            ->with('message', 'Maaf username tidak terdaftar, silahkan hubungi admin!');
    }

    public function logoff()
    {
        session()->set('isLoggedIn', false);

        return redirect()->to(base_url('Login'))->with('type-status', 'info')
            ->with('message', 'Berhasil keluar');
    }
}
