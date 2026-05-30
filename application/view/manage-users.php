<?php
include '../../config/database.php';
$query = "SELECT * FROM admins";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Account Status</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Manage Status</h2>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td>
                        <?php
                            if($row['account_locked'] == 1){
                                echo "Locked";
                            } else{
                                echo "Actived";
                            }
                        ?>
                    </td>
                    <td><button type="button" class="btn btn-success"><a href="../../unlock-account.php?id=<?php echo $row['id'];?>">Unlock</a></button></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </body>
</html>