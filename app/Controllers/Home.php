<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\MainModel;

class Home extends BaseController
{
    protected $objRequest;
    protected $objHomeModel;
    protected $objMainModel;

    public function __construct()
    {
        # Services
        $this->objRequest = \Config\Services::request();
        # Models
        $this->objHomeModel = new HomeModel;
        $this->objMainModel = new MainModel;
        # Helper
        helper('Site');
    }
    
    public function index()
    {
        $data = array();
        # data
        $data['categories'] = $this->objMainModel->objData('cat');

        return view('Home/landing', $data);
    }

    public function getCatContent()
    {
        # params
        $catID = $this->objRequest->getPost('catID');

        $data = array();
        # data
        $data['subCategories'] = $this->objHomeModel->getSubCategoriesByCatID($catID);
        # page
        $view = 'home/catContent';

        return view($view, $data);
    }

    public function getSubCatContent()
    {
        # params
        $subcCatID = $this->objRequest->getPost('subCatID');

        $data = array();
        # data
        $data['products'] = $this->objHomeModel->getProductsBy('id_sub_cat', $subcCatID);
        # page
        $view = 'home/subCatContent';

        return view($view, $data);
    }
}
