<?php

class CartModel extends DB {

    public function getIn($idString) {

        $sql = 'select * from products where active = 1 &&  id IN (' . $idString . ')';
        
        return $this->fetchArray($sql);
    }

    public function add($name, $phone, $address) {

        $sql = 'insert into customer(name, address, phone, timeCreated, view)
                values ("' . $name . '", "' . $address . '", "' . $phone . '", "' . strtotime(date('d-m-Y H:i:s')) . '", "1")';
        
        return $this->lastInsertId($sql);
    }

    public function insertValue($valueString) {

        $sql = 'insert into cart(name, product_id, price, number, customer_id) values ' . substr($valueString, 0, -1);

        return $this->query($sql);
    }
}