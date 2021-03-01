<?php

class loadMenu {

    public static function getAll($limit, $offset) {

        $sql = 'select * from menus where active = 1 order by sort asc limit ' . $limit . ' offset ' . $offset;
        $db = new DB();
        return $db->query($sql);
   }

   public static function numRows() {

        $sql = 'select * from menus where active = 1 order by sort asc';
        $db = new DB();
        return $db->numRows($sql);
    }

}