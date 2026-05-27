<!DOCTYPE html>
<html>
    <head>
        <title>Verify OTP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="col-md-4 card mx-auto p-4">
                <h3 class="text-center mb-4">Verify OTP</h3>
                <form action="../../verify_otp_action.php" method="post">
                    <input type="email" name="email" id="" class="form-control" placeholder="Enter Email" required>
                    <input type="text" name="otp" id="" class="form-control" placeholder="Enter OTP" required>
                    <button type="submit" value="" class="btn btn-secondary w-100">Verify OTP</button>
                </form>
            </div>
        </div>
    </body>
</html>