<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function verifyAccessKey($accessKey)
    {
        $query = $this->db->table('config')
            ->where('id', 1);

        $data = $query->get()->getResult();

        if (!empty($data)) {
            if (password_verify($accessKey, $data[0]->access_key)) {
                $return = array();
                $return['error'] = 0;
                $return['msg'] = "SUCCESS";

                return $return;
            } else {
                $return = array();
                $return['error'] = 1;
                $return['msg'] = "INVALID_ACCESS_KEY";

                return $return;
            }
        } else {
            $return = array();
            $return['error'] = 1;
            $return['msg'] = "NOT_FOUND";

            return $return;
        }
    }
}
