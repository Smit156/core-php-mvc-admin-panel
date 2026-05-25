<?php
session_start();

if(!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>DashBoard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: #f0f0f0;
            }
            .dashboard button a{
                color: #fff;
                text-decoration: none;
                font-weight: 600;
            }
            .dashboard{
                text-align: center;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="dashboard">
            <h1>Welcome DashBoard</h1>
            <h3><?php echo $_SESSION['admin']?></h3>
            <button class="btn btn-primary"><a href="logout.php">Logout</a></button>
            <button class="btn btn-warning"><a href="application/view/change-password.php">Change Password</a></button>
        </div>
    </body>
</html>