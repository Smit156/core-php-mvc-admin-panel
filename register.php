<?php
session_start();

include 'config/database.php';
include 'application/controllers/admin.php';

$admin = new Admin($conn);
$admin->register();

include 'application/view/register.php';
?>