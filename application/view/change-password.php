<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <div class="col-md-4 mx-auto card p-4">

        <h3 class="text-center">Change Password</h3>

        <form action="../../update_password.php" method="POST">

            <input type="password" name="password" class="form-control mb-3" placeholder="New Password" required>

            <button type="submit" class="btn btn-success w-100">
                Update Password
            </button>

        </form>

    </div>

</div>

</body>
</html>