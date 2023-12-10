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

    public function products()
    {
        $data = array();
        # data
        $data['products'] = $this->objHomeModel->getProducts();

        # page
        $view = 'home/mainProducts';

        return view($view, $data);
    }
}
