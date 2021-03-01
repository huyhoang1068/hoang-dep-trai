<?php

class CartModel extends DB {

    public function get() {

        $sql = 'select * from customer order by view, id desc';

        return $this->query($sql);
    }

    public function testId($id = 0) {

        $sql = 'select * from customer where id = ' . $id;

        return $this->fetch($sql);
    }

    public function show($id = 0) {

        $sql = 'select cart.*, products.image as imgProduct
                from cart join products
                on cart.product_id = products.id
                where cart.customer_id = ' . $id;

        return $this->query($sql);
    }

    public function delete($id) {
        
        // ALTER TABLE cart
        // ADD CONSTRAINT cart_customer
        // FOREIGN KEY (customer_id)
        // REFERENCES customer (id)
        // ON DELETE CASCADE

        $sql = 'delete from customer where id = ' . $id;

        return $this->query($sql);
    }
}