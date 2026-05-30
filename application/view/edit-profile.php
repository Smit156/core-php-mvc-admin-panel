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
        <title>Edir Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>

            $(document).ready(function(){
                $('#profileForm').submit(function(e){
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url : '../../update-profile.php',
                        type : 'POST',
                        data : formData,
                        contentType : false,
                        processData : false,
                        dataType: 'json',
                        success : function(response){
                            if(response.status){
                                $('#message').html(
                                    '<div class="alert alert-success">'+
                                    response.message+
                                    '</div>'
                                );
                            } else {
                                $('#message').html(
                                    '<div class="alert alert-danger">'+
                                    response.message+
                                    '</div>'
                                );
                            }
                        }
                    });
                });
            });

        </script>
    </head>
    <body>
        <div class="conatiner mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card shadow-sm p-4">
                    <h3 class="mb-4 text-center">
                        Edit Profile
                    </h3>
                    <div id="message"></div>
                    <form enctype="multipart/form-data" id="profileForm">
                        <input type="text" name="username" id="" value="<?php echo isset($profile['username']) ? $profile['username'] : 'no username';?>" required class="form-control mb-4">
                        <input type="email" name="email" id="" value="<?php echo isset($profile['email']) ? $profile['email'] : 'No Email';?>" required class="form-control mb-4">
                        <input type="text" name="mobile" id="" value="<?php echo isset($profile['mobile']) ? $profile['mobile'] : 'No Mobile';?>" required class="form-control mb-4">
                        <input type="file" name="profile_image" id="" class="form-control mb-3">
                        <button type="submit" class="btn btn-success w-100">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>