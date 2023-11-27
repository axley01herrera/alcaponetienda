<?php

namespace App\Controllers;

use App\Models\ControlPanelModel;
use App\Models\MainModel;

class ControlPanel extends BaseController
{
    protected $objRequest;
    protected $objSession;
    protected $objMainModel;
    protected $objControlPanelModel;

    public function __construct()
    {
        $this->objRequest = \Config\Services::request();
        $this->objSession = session();
        $this->objMainModel = new MainModel;
        $this->objControlPanelModel = new ControlPanelModel;

        helper('Site');
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

    ####
    ## Section Cat
    ####

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
    } // ok

    public function groupCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # data
        $data['dtCategory'] = $this->objMainModel->objData('cat');
        $data['dtSubCategory'] = $this->objMainModel->objData('sub_cat');
        $data['totalCategory'] = sizeof($data['dtCategory']);
        $data['totalSubCategory'] = sizeof($data['dtSubCategory']);

        return view('admin/categories/dtGroupCat', $data);
    } // ok

    public function categoryDT()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # data
        $data['categories'] = $this->objMainModel->objData('cat');

        return view('admin/categories/dtCat', $data);
    } // ok

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
    } // ok

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
    } // ok

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
    } // ok

    public function subCategoryDT()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # data
        $data['subCategories'] = $this->objMainModel->objData('sub_cat');

        return view('admin/categories/dtSubCat', $data);
    } // ok

    public function modalSubCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        # params
        $action = $this->objRequest->getPost('action');
        $catID = $this->objRequest->getPost('catID');
        $subCatID = $this->objRequest->getPost('subCatID');

        $data = array();
        # data
        $data['uniqid'] = uniqid();
        $data['action'] = $action;
        $data['categories'] = $this->objMainModel->objData('cat');

        if ($action == "create")
            $data['modalTitle'] = "Nueva Categoría";
        else if ($action == "update") {
            $data['modalTitle'] = "Editando Categoría";
            $data['catID'] = $catID;
            $data['subCat'] =  $this->objMainModel->objData('sub_cat', $subCatID);
        }

        return view('admin/categories/modalSubCat', $data);
    } // ok

    public function createSubCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $catID = $this->objRequest->getPost('catID');
        $subCat = $this->objRequest->getPost('subCat');

        $data = array();
        $data['id_cat'] = $catID;
        $data['sub_category'] = $subCat;

        $result = $this->objMainModel->objCreate('sub_cat', $data);

        return json_encode($result);
    } // ok

    public function updateSubCat()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $catID = $this->objRequest->getPost('catID');
        $subCat = $this->objRequest->getPost('subCat');
        $subCatID = $this->objRequest->getPost('subCatID');

        $data = array();
        $data['id_cat'] = $catID;
        $data['sub_category'] = $subCat;

        $result = $this->objMainModel->objUpdate('sub_cat', $data, $subCatID);

        return json_encode($result);
    } // ok

    ####
    ## End Section Cat
    ####

    ####
    ## Section Products
    ###

    public function products()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        $data = array();
        # menu
        $data['activeProducts'] = "active";
        $data['products'] = $this->objControlPanelModel->getProductDT();
        # page
        $data['page'] = "admin/products/mainProducts";

        return view('layouts/controlPanel', $data);
    }

    public function modalProduct()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin')
            return view('layouts/logoutAdmin');

        # params
        $action = $this->request->getPost('action');
        $productID = $this->request->getPost('productID');

        $data = array();
        # data
        $data['uniqid'] = uniqid();
        $data['action'] = $action;
        $data['categories'] = $this->objMainModel->objData('cat');

        if ($action == "create") {
            $data['modalTitle'] = "Nuevo Producto";
        } else if ($action == "update") {
            $data['modalTitle'] = "Editando Producto";
            $data['product'] = $this->objMainModel->objData('product', $productID);
            $data['catID'] = $data['product'][0]->id_cat;
            $data['subCatID'] = $data['product'][0]->id_sub_cat;
        }

        return view('admin/products/modalProduct', $data);
    }

    public function getSelSubCatsByCat()
    {
        # params
        $catID = $this->request->getPost('catID');
        $subCatID = $this->request->getPost('subCatID');

        $data = array();
        # data
        $data['uniqid'] = uniqid();
        $data['subCatID'] = $subCatID;
        $data['subCats'] = $this->objControlPanelModel->getSubCats(null, $catID);

        return view('admin/products/selSubCat', $data);
    }

    public function createProduct()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $name = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $code = htmlspecialchars(trim($this->objRequest->getPost('code')));
        $catID = htmlspecialchars(trim($this->objRequest->getPost('catID')));
        $subCatID = htmlspecialchars(trim($this->objRequest->getPost('subCatID')));
        $cost = htmlspecialchars(trim($this->objRequest->getPost('cost')));
        $price = htmlspecialchars(trim($this->objRequest->getPost('price')));
        $pprice = htmlspecialchars(trim($this->objRequest->getPost('pprice')));
        $desc = htmlspecialchars(trim($this->objRequest->getPost('desc')));

        $duplicateName = $this->objMainModel->objCheckDuplicate('product', 'name', $name);

        if (empty($duplicateName)) {
            $duplicateCode = $this->objMainModel->objCheckDuplicate('product', 'code', $code);
            if (empty($duplicateCode)) {
                $data = array();
                $data['id_cat'] = $catID;
                $data['id_sub_cat'] = $subCatID;
                $data['name'] = $name;
                $data['code'] = $code;
                $data['cost'] = (float) $cost;
                $data['price'] = (float) $price;
                $data['profesional_price'] = (float) $pprice;
                $data['description'] = $desc;

                $result = $this->objMainModel->objCreate('product', $data);

                return json_encode($result);
            } else {
                $result = array();
                $result['error'] = 1;
                $result['msg'] = "DUPLICATE_CODE";

                return json_encode($result);
            }
        } else {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "DUPLICATE_NAME";

            return json_encode($result);
        }
    } // ok

    public function updateProduct()
    {
        # Verify Session
        if (empty($this->objSession->get('user')) || $this->objSession->get('user')['rol'] != 'admin') {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "SESSION_EXPIRED";

            return json_encode($result);
        }

        # params
        $name = htmlspecialchars(trim($this->objRequest->getPost('name')));
        $code = htmlspecialchars(trim($this->objRequest->getPost('code')));
        $catID = htmlspecialchars(trim($this->objRequest->getPost('catID')));
        $subCatID = htmlspecialchars(trim($this->objRequest->getPost('subCatID')));
        $cost = htmlspecialchars(trim($this->objRequest->getPost('cost')));
        $price = htmlspecialchars(trim($this->objRequest->getPost('price')));
        $pprice = htmlspecialchars(trim($this->objRequest->getPost('pprice')));
        $desc = htmlspecialchars(trim($this->objRequest->getPost('desc')));
        $productID = htmlspecialchars(trim($this->objRequest->getPost('productID')));

        $duplicateName = $this->objMainModel->objCheckDuplicate('product', 'name', $name, $productID);

        if (empty($duplicateName)) {
            $duplicateCode = $this->objMainModel->objCheckDuplicate('product', 'code', $code, $productID);
            if (empty($duplicateCode)) {
                $data = array();
                $data['id_cat'] = $catID;
                $data['id_sub_cat'] = $subCatID;
                $data['name'] = $name;
                $data['code'] = $code;
                $data['cost'] = (float) $cost;
                $data['price'] = (float) $price;
                $data['profesional_price'] = (float) $pprice;
                $data['description'] = $desc;

                $result = $this->objMainModel->objUpdate('product', $data, $productID);

                return json_encode($result);
            } else {
                $result = array();
                $result['error'] = 1;
                $result['msg'] = "DUPLICATE_CODE";

                return json_encode($result);
            }
        } else {
            $result = array();
            $result['error'] = 1;
            $result['msg'] = "DUPLICATE_NAME";

            return json_encode($result);
        }
    }
}
