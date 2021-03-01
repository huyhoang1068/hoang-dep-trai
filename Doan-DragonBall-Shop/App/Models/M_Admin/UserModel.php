<?php

class UserModel extends DB {

    public function login($user, $pass) {

        $sql = 'select * from users where username= "' . $user . '" and password= "' . $pass . '"' ;
        return $this->fetch($sql);
    }
}