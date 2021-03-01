<?php 

Class productModel extends DB {

    public function insert($data) {
        
        $dataInsert = '';
        foreach ($data as $key => $values) {
            $dataInsert .= '"' . $values . '",';
        }

        $sql = 'insert into products(name, price, sale, description, content, sort, active, menu_id, image, created_at) values (' . $dataInsert . time() . ')';
        return $this->query($sql);
    }

    public function num() {

        $sql = 'select id from products';
        return $this->numRows($sql);
    }

    public function get($limit, $offset) {

        $sql = 'select products.*,
                menus.id as idMenu, menus.name as nameMenu 
                from products join menus 
                on products.menu_id = menus.id
                order by id desc limit ' . $limit . ' offset ' . $offset . ' ';
                
        return $this->query($sql);
    }

    public function show($id = 0) {

        $sql = 'select * from products where id = ' . $id;
        return $this->fetch($sql);
    }

    public function update($data, $id) {

        $sql = "update products set name = '" . $data['name'] . "', 
                                    price = '" . $data['price'] . "',
                                    sale = '" . $data['sale'] . "',
                                    description = '" . $data['description'] . "',
                                    content = '" . $data['content'] . "',
                                    sort = '" . $data['sort'] . "',
                                    active = '" . $data['active'] . "',
                                    menu_id = '" . $data['menu_id'] . "'";
        
        if (isset($data['image'])) {

            $sql .= ", image = '" . $data['image'] . "'";
        }

        $sql .= "where id = " . $id;

        return $this->query($sql);
    }

    public function delete($id = 0) {

        $sql = 'delete from products where id = ' . $id;
        return $this->query($sql);
    }
}