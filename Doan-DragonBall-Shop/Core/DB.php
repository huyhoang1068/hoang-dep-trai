<?php

class DB {

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($GLOBALS['config']['localhost'], $GLOBALS['config']['username'], $GLOBALS['config']['password'], $GLOBALS['config']['database']);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error); 
        }

        $this->conn->set_charset("utf8");
    }

    public function query($sql = '') {
        
        return $this->conn->query($sql);
    }

    public function lastInsertId($sql = '') {
        
        if ($this->conn->query($sql) === TRUE) {
        
            return $this->conn->insert_id;
            
        }
            return 0;
    }

    public function fetch($sql = '') {
        
        $query = $this->query($sql);

        if ($query != '' && $query->num_rows > 0) {
            
            return $query->fetch_assoc();
        }

        return null;
    }

    public function fetchArray($sql = '') {

        $query = $this->query($sql);

        if ($query != '' && $query->num_rows > 0) {
            
            $data = [];
            while ($row = $query->fetch_assoc()) {
                
                $data[] = $row;
            }

            return $data;
        }

        return null;
    }

    public function numRows($sql) {

        $query = $this->query($sql);

        return $query->num_rows;
    }
}