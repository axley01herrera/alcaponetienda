<?php

namespace App\Models;

use CodeIgniter\Model;

class ControlPanelModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getSubCats($id = null, $catID = null)
    {
        $query = $this->db->table('sub_cat');

        if(!empty($id))
            $query->where('id', $id);

        if(!empty($catID))
            $query->where('id_cat', $catID);

        return $query->get()->getResult();
    } // ok

    public function getProductDT()
    {
        $query = $this->db->table('product p')
        ->select('
        p.id AS productID,
        p.photo AS photo,
        p.id_cat AS catID,
        p.id_sub_cat AS subCatID,
        p.name AS productName,
        p.code AS productCode,
        p.cost AS productCost,
        p.price AS productPrice,
        p.profesional_price AS profesionalProductPrice,
        p.status AS status,
        p.stock AS stock,
        cat.cat AS category,
        sub_cat.sub_category AS subCategory
        ');

        $query->join('cat', 'cat.id = p.id_cat');
        $query->join('sub_cat', 'sub_cat.id = p.id_sub_cat');

        $data = $query->get()->getResult();

        return $data;
    } // ok
}