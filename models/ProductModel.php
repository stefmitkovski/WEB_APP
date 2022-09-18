<?php
class ProductModel

{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query('SELECT * FROM products');
    }

    public function getNew(){
        return $this->db->query('SELECT * FROM products ORDER BY created_on ASC');
    }

    public function getPopular(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products ORDER BY stock');
    }

}
