<?php

namespace App\Controllers;

use App\Models\MainModel;

class ControlPanel extends BaseController
{
    protected $objRequest;
    protected $objSession;
    protected $objMainModel;

    public function __construct()
    {
        $this->objRequest = \Config\Services::request();
        $this->objSession = session();
        $this->objMainModel = new MainModel;
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
        $data['activeCat'] = "active";
        # page
        $data['page'] = "admin/categories/mainCategories";

        return view('layouts/controlPanel', $data);
    }

    public function categoryDT()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # data
        $data['categories'] = $this->objMainModel->objData('cat');

        return view('admin/categories/dtCat', $data);
    }

    public function subCategoryDT()
    {
    }

    public function modalCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        # params
        $action = $this->objRequest->getPost('action');
        $catID = $this->objRequest->getPost('catID');

        $data = array();
        # data
        $data['uniqid'] = uniqid();
        $data['action'] = $action;

        if ($action == "create")
            $data['modalTitle'] = "Nueva Categoría";
        else if ($action == "update") {
            $data['modalTitle'] = "Editando Categoría";
            $data['cat'] =  $this->objMainModel->objData('cat', $catID);
        }

        return view('admin/categories/modalCat', $data);
    }

    public function createCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $cat = $this->objRequest->getPost('cat');

        $duplicateCat = $this->objMainModel->objCheckDuplicate('cat', 'cat', $cat);

        if (empty($duplicateCat)) {
            $result = $this->objMainModel->objCreate('cat', ['cat' => $cat]);
            return json_encode($result);
        } else {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "DUPLICATE_RECORD";

            return json_encode($result);
        }
    }

    public function updateCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $cat = $this->objRequest->getPost('cat');
        $catID = $this->objRequest->getPost('catID');

        $duplicateCat = $this->objMainModel->objCheckDuplicate('cat', 'cat', $cat, $catID);

        if (empty($duplicateCat)) {
            $result = $this->objMainModel->objUpdate('cat', ['cat' => $cat], $catID);
            return json_encode($result);
        } else {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "DUPLICATE_RECORD";

            return json_encode($result);
        }
    }
}
