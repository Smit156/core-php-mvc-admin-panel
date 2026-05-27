<?php
session_start();

include 'config/database.php';

$email = $_SESSION['reset_email'];

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query = 'UPDATE admins SET password = ?, otp=null, otp_expiry=null WHERE email = ?';

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $password, $email);

if(mysqli_stmt_execute($stmt)){
    unset($_SESSION['reset_email']);
    echo " Password Reset Successfully";
} else {
    echo "Failed";
}

?>