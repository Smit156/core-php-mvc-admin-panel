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

            if($admin && password_verify($password, $admin['password'])){

                session_regenerate_id(true);
                $_SESSION['admin'] = $admin['username'];
                $_SESSION['admin_id'] = $admin['id'];
                
                echo "success";
                // header("Location: /ccccc/admin/application/view/dashboard.php");
                exit;

            } else {

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