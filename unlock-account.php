<?php
include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);
$id = $_GET['id'];
$model->unlockAccout($id);
header('Location: application/view/manage-users.php');
?>