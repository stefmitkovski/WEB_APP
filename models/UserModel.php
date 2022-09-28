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

    public function createUser($email,$phone,$password){   // Креирај корисник
        $statemant = $this->db->prepare('INSERT INTO users (email,phone_number,password) 
                                    values (:email, :phone_number, :password)');
        $statemant->bindValue(':email', $email);
        $statemant->bindValue(':phone_number',$phone);
        $statemant->bindValue(':password', $password);
        return $statemant->execute();
    }

    public function checkCredentials(){ // Провери дали се валидни податоците (недовршено)
        return 0; 
    }
}
