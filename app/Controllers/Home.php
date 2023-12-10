<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    protected $objRequest;
    protected $objHomeModel;

    public function __construct()
    {
        # Services
        $this->objRequest = \Config\Services::request();
        # Models
        $this->objHomeModel = new HomeModel;
        # Helper
        helper('Site');
    }
    
    public function index(): string
    {
        $data = array();
        # page
        $data['page'] = 'home/products';

        return view('Home/mainHome', $data);
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
