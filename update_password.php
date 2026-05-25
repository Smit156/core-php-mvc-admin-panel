<?php

session_start();

include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);

$id = $_SESSION['admin_id'];
$password = $_POST['password'];

if($model->changePassword($id, $password)){

    echo "Password Updated Successfully";

} else {

    echo "Failed";
}

?>