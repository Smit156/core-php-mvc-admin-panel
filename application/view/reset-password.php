<?php 
session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>
            Reset Password
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="contanier mt-5">
            <div class="col-md-4 card mx-auto p-4">
                <h3 class="text-center mb-4">
                    Reset Password
                </h3>
                <form action="/ccccc/admin/update-reset-password.php" method="POST">
                    <input type="password" name="password" id="" placeholder="Enter New password" required class="form-control">
                    <button type="submit" class="btn btn-success w-100">Update Password</button>
                </form>
            </div>
        </div>
    </body>
</html>
