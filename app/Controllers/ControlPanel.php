<?php

namespace App\Controllers;


class ControlPanel extends BaseController
{
    protected $objRequest;
    protected $objSession;

    public function __construct()
    {
        $this->objRequest = \Config\Services::request();
        $this->objSession = session();
    }

    public function dashboard()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # menu
        $data['activeDashboard'] = "active";
        # page
        $data['page'] = "admin/dashboard/mainDashboard";

        return view('layouts/controlPanel', $data);
    }

    public function catgories()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # menu
        $data[''] = "active";
    }
}
