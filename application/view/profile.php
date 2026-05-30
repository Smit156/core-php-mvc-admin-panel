<?php
session_start();
if(!isset($_SESSION['admin_id'])){

    header('Location: login.php');
    exit;
}
include '../../config/database.php';
include '../models/admin.php';

$model = new adminmodel($conn);
if(isset($_SESSION['admin_id'])){
    $id = $_SESSION['admin_id'];
    $profile = $model->Getprofile($id);
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="card">
                <div class="text-center">
                    <?php $image = !empty($profile['profile_image']) ? "../../assets/uploads/".$profile['profile_image']: "https://cdn-icons-png.flaticon.com/512/149/149071.png";?>
                    <img src="<?php echo $image;?>" alt="" srcset="" width="120" height="120" style = "border-radius: 50%; object-fit:cover;">
                    <h3 class="mt-3"><?php echo isset($profile['username']) ? $profile['username'] : 'No Username';?></h3>
                </div>
                <hr>
                <p><strong>Email : </strong><?php echo isset($profile['email']) ? $profile['email'] : 'No Email';?></p>
                <p><strong>mobile : </strong><?php echo isset($profile['mobile']) ? $profile['mobile'] : 'No Mobile';;?></p>
                <p><strong>Created : </strong><?php echo isset($profile['created_at']) ? $profile['created_at'] : 'No Date';?></p>
                <a href="../../application/view/edit-profile.php" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </body>
</html>