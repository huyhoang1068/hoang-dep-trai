<?php

class MenuModel extends DB {

    public function insert($data, $name) {

        $sql = 'insert into menus (name, sort, active, created_at) 
                values ("' . $name . '", ' . intval($data['sort']) . ', ' . intval($data['active']) . ' , ' . time() . ')';
        
        return $this->query($sql);
    
    }

    public function getAll() {

        $sql = 'select * from menus where active = 1 order by id asc';
        return $this->query($sql);
    }

    public function get($limit, $offset) {

        $sql = 'select * from menus order by id desc limit ' . $limit . ' offset ' . $offset . ' ';
        return $this->query($sql);
    }

    public function num() {

        $sql = 'select id from menus';
        return $this->numRows($sql);
    }
    
    public function show($id) {

        $sql = 'select * from menus where id = ' . $id;
        return $this->fetch($sql);
    }

    public function update($name, $data, $id) {

        $sql = 'update menus set name = "' . $name . '", sort = ' . intval($data['sort']) . ',
                                 active = ' . intval($data['active']) . ' where id = ' . $id;
        return $this->query($sql);
    }

    public function delete($id = 0) {

        $sql = 'delete from menus where id = ' . $id;
        return $this->query($sql);
    }
}