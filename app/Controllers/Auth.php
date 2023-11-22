<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function admin()
    {
        return view('admin/auth/mainAuth');
    }
}