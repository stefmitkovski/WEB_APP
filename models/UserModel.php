<?php
class UserModel

{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function checkExistence($email){ // Провери дали постои корисник со овој емаил
        $statement = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$email]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($email,$name,$password){   // Креирај корисник
        $statemant = $this->db->prepare('INSERT INTO users (email,name,password) 
                                    values (:email, :name, :password)');
        $statemant->bindValue(':email', $email);
        $statemant->bindValue(':name',$name);
        $statemant->bindValue(':password', $password);
        return $statemant->execute();
    }

    public function checkCredentials($email){ // Провери дали се валидни податоците (недовршено)
        $statement = $this->db->prepare('SELECT password,name FROM users WHERE email = :email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        return $statement; 
    }
}