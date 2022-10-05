<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../../vendor/autoload.php';
require_once 'UserModel.php';
require_once 'ProductModel.php';


class TransactionModel

{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function createTranaction($email, $product, $quantity,$price)
    {
        $user = new UserModel($this->db);
        if ($user->checkExistence($email)->rowCount() == 1) {
            $statemant = $this->db->prepare('INSERT INTO transaction (user,product,quantity,price) 
            values (:user, :product, :quantity, :price)');
            $statemant->bindValue(":user", $email);
            $statemant->bindValue(":product", $product);
            $statemant->bindValue(":quantity", $quantity);
            $statemant->bindValue(":price", $price);
            return $statemant->execute();
        }
        $statemant = $this->db->prepare('INSERT INTO transaction (anon_user,product,quantity,price) 
        values (:anon_user, :product, :quantity, :price)');
        $statemant->bindValue(":anon_user", $email);
        $statemant->bindValue(":product", $product);
        $statemant->bindValue(":quantity", $quantity);
        $statemant->bindValue(":price", $price);
        return $statemant->execute();
    }

    public function transactionMail($email, $products)
    {
        $total = 0;
        $output = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
        $output .= '<p>You have successfully purchest: </p><div class="col-md-5 col-lg-4 order-md-last"><ul class="list-group mb-3">';
        $output .= '<p>-------------------------------------------------------------</p>';
        foreach ($products as $p) {
            $product = new ProductModel($this->db);
            $prod = $product->getSpecific($p->productID);
            $output .= ' <li class="list-group-item d-flex justify-content-between lh-sm">
           <div>
               <h6 class="my-0">' . $prod['title'] . '</h6>
               <small class="text-muted">Quantity: ' . $p->quantity . '</small>
           </div></li>';
           if ($prod['price_new']){
            $output .= '<span class="text-muted">$'.$prod['price_new'].'</span>';
            $total = $total + $prod["price_new"] * $p->quantity;
           }else{
            $output .= '<span class="text-muted">$'.$prod["price_old"].'</span>';
            $total = $total + $prod['price_old'] * $p->quantity;
           }
        }
        $output .= '</ul><p>-------------------------------------------------------------</p>';
        $output .= '<p>Total: $' . round($total * 1.2) . '</p></div>';
        $body = $output;
        $subject = "Recite from Electro";
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4ba1f5378ec980';    // Овие се генерирани од mailtrap
        $mail->Password = 'c0c67c9e161b9c';    //
        $mail->IsHTML(true);
        $mail->From = "noreply@electro.com";
        $mail->FromName = "Electro";
        $mail->Sender = "noreply@electro.com";
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
