<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../../vendor/autoload.php';
require_once '../../views/partials/header.php';
require_once '../../models/UserModel.php';
require_once '../../database.php';

session_unset();
// session_destroy();
session_start();

if(isset($_SESSION['name'])){   // Ако си најавен да те одлогира
    header("Location: logout.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserModel($db);
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['token'])) {
        $attempt = $user->changePassword($_POST['email'], $_POST['token'], $_POST['password']);
        if ($attempt == 1) {
            require_once '../../views/partials/success.php';
        } else {
            require_once '../../views/partials/errors.php';
        }
    } else if (isset($_POST['email'])) {
        $token = $user->createToken($_POST['email']);
        if ($token == 0) {
            require_once '../../views/partials/errors.php';
        } else {
            $output = '<p>Dear user,</p>';
            $output .= '<p>Please click on the following link to reset your password.</p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p><a href="http://localhost/public/products/forgot.php?token=' . $token . '&email=' . $_POST['email'] . '</a>Link</p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>Electro Team</p>';
            $body = $output;
            $subject = "Password Recovery - Electro Shop";
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
            $mail->AddAddress($_POST['email']);
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                require_once '../../views/partials/success.php';
            }
        }
    }
}
?>
<form action="forgot.php" method="POST">
    <div class="container pt-5 col-md-5 col-md-offset-4">
        <div class="span12 text-center">
            <a href="index.php"><img class="fs-4 primary" src="logo/elektro1-1.png" height="100px" width="400px" alt=""></a>
        </div>
        <div class="mb-3">
            <p class="form-label">Email</p>
            <?php if (isset($_GET['token']) && isset($_GET['email'])) : ?>
                <input type="text" name="email" class="form-control" id="username" value="<?php echo $_GET['email']; ?>" readonly>
            <?php else : ?>
                <input type="text" name="email" class="form-control" id="username" placeholder="Enter your email here">
            <?php endif; ?>
        </div>
        <?php if (isset($_GET['token']) && isset($_GET['email'])) : ?>
            <div class="mb-3">
                <p class="form-label">Password</p>
                <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
                <input type="password" name='password' class="form-control" id="password" placeholder="Enter your password here">
            </div>
            <button type="submit" class="btn btn-primary">Confirm</button>
        <?php else : ?>
            <button type="submit" class="btn btn-primary">Reset</button>
        <?php endif; ?>
    </div>
</form>