<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $objRequest;
    protected $objSession;
    protected $objAuthModel;

    public function __construct()
    {
        $this->objRequest = \Config\Services::request();
        $this->objSession = session();
        $this->objAuthModel = new AuthModel;

        # Destroy Session
        $sessionArray['rol'] = '';
        $this->objSession->set('user', $sessionArray);
    }

    public function admin()
    {
        # params
        $msg = $this->objRequest->getPostGet('msg');

        $data = array();
        # data
        $data['uniqid'] = uniqid();
        $data['msg'] = $msg;
        # page
        $data['page'] = "admin/auth/mainAuth";

        return view($data['page'], $data);
    }

    public function loginAdmin()
    {
        # params
        $accessKey = htmlspecialchars(trim($this->objRequest->getPost('accessKey')));
        $result = $this->objAuthModel->verifyAccessKey($accessKey);

        if ($result['error'] == 0) {
            # Create Session
            $sessionArray['rol'] = 'admin';
            $this->objSession->set('user', $sessionArray);
        }

        return json_encode($result);
    }
}
