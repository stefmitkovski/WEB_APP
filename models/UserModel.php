<?php
class UserModel

{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function checkExistence($email)
    { // Провери дали постои корисник со овој емаил
        $statement = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$email]);
        return $statement;
    }

    public function createUser($email, $name, $password)
    {   // Креирај корисник
        if($this->checkExistence($email)->rowCount() == 0){
        $statemant = $this->db->prepare('INSERT INTO users (email,name,password) 
                                    values (:email, :name, :password)');
        $statemant->bindValue(':email', $email);
        $statemant->bindValue(':name', $name);
        $statemant->bindValue(':password', $password);
        return $statemant->execute();
        }
        return 0;
    }

    public function createToken($email)
    {    // Креиранје токен за ресетирање на лозинка
        if ($this->checkExistence($email)->rowCount()) {
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $statemant = $this->db->prepare('INSERT INTO reset_password (email, token) VALUES (:email, :token);');
            $statemant->bindValue(":email", $email);
            $statemant->bindValue(":token", $token);
            $statemant->execute();
            return $token;
        }
        return 0;
    }

    public function checkToken($email, $token)
    {  // Прокеруваме дали внесениот токен е валиден
        $statemant = $this->db->prepare("SELECT email FROM reset_password WHERE email = :email AND token = :token");
        $statemant->bindValue(":email", $email);
        $statemant->bindValue(":token", $token);
        $statemant->execute();
        return $statemant->rowCount();
    }

    public function changePassword($email, $token, $pass)
    {    // Промена на лозинка ако е валиден токенот
        if ($this->checkToken($email, $token) == 1) {
            $password = password_hash($pass, PASSWORD_DEFAULT);
            $statemant = $this->db->prepare('UPDATE users SET password = :password WHERE email = :email');
            $statemant->bindValue(":password", $password);
            $statemant->bindValue(":email", $email);
            $statemant->execute();
            return $statemant->rowCount();
        }
        return 0;
    }
}
