<?php

include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);

$email = $_POST['email'];
$otp = RAND(100000,999999);
$expiry = date('Y-m-d H:i:s',strtotime('+5 minutes'));
$model->SaveOTP($email, $otp, $expiry);
echo "OTP Send Successfully";

?>