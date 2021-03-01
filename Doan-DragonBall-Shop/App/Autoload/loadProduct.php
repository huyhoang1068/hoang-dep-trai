<?php

class loadProduct {

    public static function getAll() {

        $limit = 9;
        $sql = 'select products.*, menus.id as menu_id, menus.name as menu_name
                from products join menus
                on products.menu_id = menus.id
                where products.active = 1 order by sort asc limit ' . $limit;

        $db = new DB();
        return $db->query($sql);
    }

    public static function numRows() {

        $sql = 'select products.*, menus.id as menu_id, menus.name as menu_name
                from products join menus
                on products.menu_id = menus.id
                where products.active = 1 order by sort asc';

        $db = new DB();
        return $db->numRows($sql);
    }

}
