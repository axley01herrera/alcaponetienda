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
    }
}