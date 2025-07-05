<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        if (session()->get('logged_in')) {
            // Jika sudah login, redirect ke admin panel
            return redirect()->to(base_url('admin/artikel'));
        } else {
            // Jika belum login, redirect ke halaman login
            return redirect()->to(base_url('user/login'));
        }
    }
}
