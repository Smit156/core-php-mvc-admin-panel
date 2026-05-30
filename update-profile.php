<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    echo json_encode([
        'status' => false,
        'message' => 'Login Required'
    ]);

    exit;
}

include 'config/database.php';
include 'application/models/admin.php';

$model = new adminmodel($conn);
$id = $_SESSION['admin_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
if(empty($username) || empty($mobile)){
    echo json_encode([
        'status' => false,
        'message' => 'All Filed Required'
    ]);
    exit;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode([
        'status' => false,
        'message' => 'Email Invaild'
    ]);
    exit;
}
$model->updateProfile($id,$username,$email,$mobile);

if($_FILES['profile_image']['name'] != ''){
    $allow = ['jpg','png','jpeg'];

    // $images = time().$_FILES['profile_image']['name'];
    $file_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    $size = $_FILES['profile_image']['size'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if(!in_array($ext, $allow)){
        die("Only JPG and PNG allowed");
    }
    if($size > 2097152){
        die("File size Must be less than 2MB");
    }
    $images = time().$file_name;
    move_uploaded_file($tmp_name,'assets/uploads/'.$images);
    $model->updateProfileImages($id, $images);
}
// $_SESSION['success'] = "Profile Updated Successfully";
echo json_encode([
    'status'=>true,
    'message'=>'Profile update successfully'
]);
// header("Location: application/view/profile.php");
?>