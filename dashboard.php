<?php
session_start();

if(!isset($_SESSION['admin'])){
    header('Location: index.php');
    exit;
}

if(isset($_SESSION['LAST_ACTIVITY'])){
    if(time() - $_SESSION['LAST_ACTIVITY'] > 1800){
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}

$_SESSION['LAST_ACTIVITY'] = time();
?>

<!-- <!DOCTYPE HTML>
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
            <button class="btn btn-dark"><a href="application/view/profile.php">My Profile</button>
        </div>
    </body>
</html> -->

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.sidebar{
    height:100vh;
    background:#212529;
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:12px;
    text-decoration:none;
    margin-bottom:10px;
    border-radius:5px;
}

.sidebar a:hover{
    background:#0d6efd;
}

.card-box{
    border:none;
    border-radius:10px;
}

</style>

</head>
<body>

<div class="container-fluid">

<div class="row">

    <div class="col-md-2 sidebar">

        <h3 class="text-white mb-4">

            Admin Panel

        </h3>

        <a href="dashboard.php">Dashboard</a>

        <a href="application/view/profile.php">My Profile</a>

        <a href="application/view/change-password.php">Change Password</a>

        <a href="logout.php">Logout</a>

    </div>

    <div class="col-md-10 p-4">

        <div class="card card-box p-4 shadow-sm">

            <h2>

                Welcome <?php echo $_SESSION['admin']?> 👋

            </h2>

            <p>

                Professional Admin Dashboard

            </p>

        </div>

        <div class="row mt-4">

            <div class="col-md-4">

                <div class="card p-4 shadow-sm">

                    <h5>Total Products</h5>

                    <h2>0</h2>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-4 shadow-sm">

                    <h5>Total Users</h5>

                    <h2>0</h2>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card p-4 shadow-sm">

                    <h5>Total Sales</h5>

                    <h2>0</h2>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</body>
</html>