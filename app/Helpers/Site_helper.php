<?php
if (!function_exists('getCatByID')) {
    function getCatByID($catID)
    {
        $cat = "Undefined";

        $db = \Config\Database::connect();
        $query = $db->table('cat')
            ->select('cat')
            ->where('id', $catID);

        $data = $query->get()->getResult();

        if (!empty($data))
            $cat = $data[0]->cat;

        return $cat;
    }
}

