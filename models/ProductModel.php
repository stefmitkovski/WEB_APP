<?php
class ProductModel

{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query('SELECT * FROM products LIMIT 3');
    }

    public function getNew(){
        return $this->db->query('SELECT * FROM products ORDER BY created_on ASC LIMIT 3');
    }

    public function getPopular(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products ORDER BY stock ASC LIMIT 3');
    }
    
    public function getOnSale(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products ORDER BY price_new  ASC LIMIT 3');
    }

    public function getSprecific($id){
        $statement = $this->db->prepare("SELECT * FROM products WHERE product_id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
