<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            jQuery(document).ready(function(){
                jQuery('#loginForm').submit(function(e){
                    e.preventDefault();
                    jQuery.ajax({
                        url: 'index.php',
                        type: 'POST',
                        data: {
                            login:true,
                            username: jQuery('input[name=username]').val(),
                            password: jQuery('input[name=password]').val()
                        },
                        // data : $(this).serialize(),
                        success: function(response){                                                                   
                            // console.log('success');
                            if(response.trim() == 'success'){
                                window.location.href = '/ccccc/admin/dashboard.php';
                            }else{
                                alert(response);
                            }
                        },
                    });
                });
            });
        </script>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: #f0f0f0;
            }
            .login-box{
                width: 350px;
                background: white;
                padding: 30px;
                margin: 100px auto;
                border-radius: 20px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }
            .login-box h2{
                text-align: center;
                margin-bottom: 20px;
                font-weight: 900;
            }
            .login-box input{
                width: 97%;
                padding: 10px;
                margin-bottom: 10px;
                border: 3px solid #ccc;
                border-radius: 10px;
            }
            .login-box button{
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
            .login-box div a:hover{
                color : blue;
                border-bottom: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>Admin Login</h2>
            <form id="loginForm" method="post">
                <input type="text" name="username" id="" placeholder="Enter Username" required class="form-control mb-3">
                <input type="password" name="password" id="" placeholder="Enter Password" required class="form-control mb-3">
                <button type="submit" name='login' class="btn btn-primary btn-save">Login</button>
                <div class='text-center mt-3'><a href="register.php">Create Account</a> | <a href="forgot-password.php">Forgot Password</a></div>
                <!-- <div class='text-center mt-3'><a href="forgot-password.php">Forgot Password</a></div> -->
            </form>
        </div>
    </body>
</html>