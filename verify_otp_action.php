<?php
session_start();
include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);

$email = trim($_POST['email']);
$otp = trim($_POST['otp']);

echo "EMAIL : ".$email."<br>";
echo "OTP : ".$otp."<br>";

$check = $model->VerifyOTP($email, $otp);

if($check){
    $_SESSION['reset_email'] = $email;
    header('Location: /ccccc/admin/application/view/reset-password.php'); 
    exit;
} else {
    echo "Invild OTP OR OTP Expiry";
}
?>