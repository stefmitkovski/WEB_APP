<?php
class ProductModel

{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }
    
    public function getAll($sort) {
        $e = $this->sort($sort);
        if($e == ""){
            $e = "ORDER BY RAND()";
        }
        return $this->db->query("SELECT * FROM products $e");
    }

    public function getNew(){
        return $this->db->query('SELECT * FROM products ORDER BY created_on ASC LIMIT 4');
    }

    public function getNewAll(){
        return $this->db->query('SELECT * FROM products ORDER BY created_on ASC');
    }

    public function getPopular(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products ORDER BY stock ASC LIMIT 4');
    }

    public function getPopularAll(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products ORDER BY stock ASC');
    }
    
    public function getOnSale(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products WHERE price_new IS NOT NULL ORDER BY price_new  ASC LIMIT 4');
    }

    public function getOnSaleAll(){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        return $this->db->query('SELECT * FROM products WHERE price_new IS NOT NULL ORDER BY price_new  ASC');
    }

    public function getBrand($n,$sort){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        $e = $this->sort($sort);
        return $this->db->query("SELECT * FROM products WHERE brand in ('$n')  $e");
    }
    public function getArrayBrand($n,$sort){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        $g =implode("','",$n);
        $e = $this->sort($sort); 
        return $this->db->query("SELECT * FROM products WHERE brand in ('$g')  $e");
    }
    public function getByCategory($n,$sort){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        $e = $this->sort($sort);
        return $this->db->query("SELECT * FROM products WHERE category in ('$n')  $e");
    }

    public function getArrayCategory($n,$sort){ 
        $g =implode("','",$n);
        $e = $this->sort($sort);
        return $this->db->query("SELECT * FROM products WHERE category in ('$g')  $e");
    }
    public function getFromBothLists($a,$b,$sort){ // При времено е ова вака иначе ќе се сортира од табелата за транзакции
        $c =implode("','",$a);
        $d =implode("','",$b);
        $e = $this->sort($sort);
        return $this->db->query("SELECT * FROM products WHERE brand IN ('$c') and category IN ('$d')  $e ");
    }
    
    public function getSpecific($id){
        $statement = $this->db->prepare("SELECT * FROM products WHERE product_id = :id");
        $statement->bindValue(":id",$id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function sort($sort){
        $e="";
        if($sort == 1){ // getAtoZ
            $e="ORDER BY title ASC"; 
        }elseif($sort == 2){ // getZtoA
            $e="ORDER BY title DESC";
        }elseif($sort==3){ // getHighToLow
            $e = "ORDER BY price_old  DESC";
        } elseif($sort==4){ //getLowToHigh
            $e = "ORDER BY price_old  ASC";
        }else{
            $e = "";
        }
        // echo "sort" . $sort ."</br>".$e;
        return $e;
    }
}
