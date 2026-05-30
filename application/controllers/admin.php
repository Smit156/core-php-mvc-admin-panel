<?php 

include __DIR__ . '/../models/admin.php';


class Admin{

    public $model;

    public function __construct($conn){
        $this->model = new adminmodel($conn);
    }

    public function login(){

        if(isset($_POST['login'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->model->login($username);

            if(!$admin){
                echo "Invaild Username";
                exit;
            }

            if($admin['account_locked'] == 1){
                $locktime = strtotime($admin['lock_time']);
                $current = time();
                $diff = $current - $locktime;
                if($diff >= 900){
                    $this->model->unlockAccout($admin['id']);
                } else{
                    echo "Account Locked for 15 minutes";
                    exit();
                }
            } 

            if($admin && password_verify($password, $admin['password'])){

                session_regenerate_id(true);
                $_SESSION['admin'] = $admin['username'];
                $_SESSION['admin_id'] = $admin['id'];

                $this->model->updateloginAttept($admin['id'],0);
                $this->model->updateLastlogin($admin['id']);
                $this->model->insertLoginHistory($admin['id'],$_SERVER['SERVER_ADDR'],'success');
                $this->model->activityLog($admin['id'],'Admin Login');
                echo "success";
                // header("Location: /ccccc/admin/application/view/dashboard.php");
                exit;

            } else {
                // echo $admin['login_attempt'];
                // exit;
                $attempt = $admin['login_attempt'] +1;
                $this->model->updateloginAttept($admin['id'],$attempt);
                $this->model->insertLoginHistory($admin['id'],$_SERVER['REMOTE_ADDR'],'Failed');
                if($attempt >= 5){
                    $this->model->LockAccout($admin['id']);
                    echo "Account Locked";
                }
                echo "Invaild Username and Password";
                exit;
            }
        }
    }

    public function register(){
        if(isset($_POST['register'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($this->model->register($username, $email, $password)){
                // $_SESSION['success'] = "Account Created Successfully";
                // header("Location: /ccccc/admin/register.php");
                // exit;
                echo "Account Created Successfully";
            } else {
                // $_SESSION['error'] = "Something Went Wrong";
                echo "Something Went Wromg";
            }
        }
    }
}

?>