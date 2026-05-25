<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="contanier mt-5">
            <div class="col-md-4 card p-4">
                <h3 class="text-center">Forget Password</h3>
                <form action="send-otp.php" method="post">
                    <input type="email" name="email" id="" class="form-control" required placeholder="Enter Email">
                    <button type="submit" class="btn btn-warning w-100">Send OTP</button>
                </form>
            </div>
        </div>
    </body>
</html>