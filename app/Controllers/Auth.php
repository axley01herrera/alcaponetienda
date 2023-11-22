<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function admin()
    {
        $data = array();
        # data
        $data['uniqid'] = uniqid();
        # page
        $data['page'] = "admin/auth/mainAuth";

        return view($data['page'], $data);
    }
}