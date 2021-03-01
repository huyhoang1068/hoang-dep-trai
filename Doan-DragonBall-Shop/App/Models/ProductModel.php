<?php

class ProductModel extends DB {

    public function getAll() {

        $sql = 'select products.*, menus.id as menu_id, menus.name as menu_name
                from products join menus
                on products.menu_id = menus.id
                where products.active = 1 order by sort asc';

        return $this->query($sql);
        #return $this->fetchArray($sql);
    }

    public function getProduct($menuId = 0, $limit, $offsetNew) {

        $sql = 'select * from products where menu_id = ' . $menuId . ' order by sort asc limit ' . $limit . ' offset ' . $offsetNew;

        return $this->query($sql);
    }

    public function num($menuId = 0) {

        $sql = 'select id from products where active = 1 && menu_id = ' . $menuId ;
        
        return $this->numRows($sql);
    }

    public function show($id) {

        $sql = 'select products.*, menus.id as menu_id, menus.name as menu_name
                from products join menus
                on products.menu_id = menus.id
                where products.active = 1 && products.id = ' . $id;

        return $this->fetch($sql);
    }
}