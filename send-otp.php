<?php
date_default_timezone_set('Asia/Kolkata');

include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);

$email = $_POST['email'];
echo "Email" .$email . "<br>";
$otp = RAND(100000,999999);
echo "OTP" .$otp . "<br>";
$expiry = date('Y-m-d H:i:s',strtotime('+5 minutes'));
echo "OTP Expiry" .$expiry . "<br>";
$model->SaveOTP($email, $otp, $expiry);
header('Location: application/view/verify_otp.php');
exit;
?>