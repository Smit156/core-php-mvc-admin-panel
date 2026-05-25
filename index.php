<?php
session_start();
include 'config/database.php';
include 'application/controllers/admin.php';

$admin = new Admin($conn);

$admin->login();

if(isset($_POST['login'])){
    exit;
}

include 'application/view/login.php';
?>