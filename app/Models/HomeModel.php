<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getSubCategoriesByCatID($catID)
    {
        $query = $this->db->table('sub_cat')
        ->where('id_cat', $catID);

        $data = $query->get()->getResult();

        return $data;
    }

    public function getProductsBy($filter = null, $value = null)
    {
        $query = $this->db->table('product');
        
        $query->groupStart();
        $query->where('status', 1);
        $query->groupEnd();

        if(!empty($filter))
            $query->where($filter, $value);
        
        $data = $query->get()->getResult();

        return $data;
    }
}