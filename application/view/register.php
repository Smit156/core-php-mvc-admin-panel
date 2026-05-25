<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: #f0f0f0;
            }
            /* .register-box{
                width: 350px;
                background: white;
                padding: 30px;
                margin: 100px auto;
                border-radius: 20px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
             } */
            /* .register-box h3{
                text-align: center;
                margin-bottom: 20px;
                font-weight: 900;
            }
            .register-box input{
                width: 97%;
                padding: 10px;
                margin-bottom: 10px;
                border: 3px solid #ccc;
                border-radius: 10px;
            }
            .register-box button{
                width: 97%;
                border-radius: 10px;
                padding: 10px;
                font-weight: 600;
            }
            .login-box div a{
                color: #000;
                font-size: 12px;
                text-decoration: none;
            }
            .register-box div a:hover{
                color : blue;
                border-bottom: 1px solid #000;
            } */
        </style>
    </head>
    <body>
        <div class="container mt-5 register-box">
            <div class="col-md-4 mx-auto card p-4">
                <h3 class="text-center mb-4">Create Account</h3>
                <form action="" method="post">
                    <input type="text" name="username" id="" class="form-control mb-3" required placeholder="Enter Username">
                    <input type="text" name="email" id="" class="form-control mb-3" required placeholder="Enter Email">
                    <input type="password" name="password" id="" class="form-control mb-3" required placeholder="Enter Password">
                    <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </body>
</html>