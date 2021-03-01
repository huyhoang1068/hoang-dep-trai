<?php
 
 class MenuModel extends DB {

    public function getAll(){

        $sql = 'select * from menus where active = 1 order by sort desc';

        return $this->query($sql);
    }

    public function show($id) {

        $sql = 'select * from menus where active = 1 && id = ' . intval($id);

        return $this->fetch($sql);
    }
 }