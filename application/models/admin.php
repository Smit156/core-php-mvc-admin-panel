<?php

class adminmodel{

    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function login($username){

        $query = "SELECT * FROM admins WHERE username =?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function register($username, $email, $password){

        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admins (username, email, password) VALUES (?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpassword);
        return mysqli_stmt_execute($stmt);
    }

    public function ChangePassword($id, $password){
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE admins SET password = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'si', $hashpassword, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function SaveOTP($email, $otp, $expiry){
        $query = "UPDATE admins SET otp=?, otp_expiry=? WHERE email=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $otp, $expiry, $email);
        return mysqli_stmt_execute($stmt);
    }

    public function VerifyOTP($email, $otp){
        $query = "SELECT * FROM admins WHERE email=? AND otp=? AND otp_expiry > NOW()";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $otp);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function Getprofile($id){
        $query = "SELECT * FROM admins WHERE id=?";
        $stmt = mysqli_prepare($this->conn,$query);
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function updateProfile($id,$username,$email,$mobile){
        $query = "UPDATE admins SET username=?, email=?, mobile=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt,'sssi',$username,$email,$mobile,$id);
        return mysqli_stmt_execute($stmt);
    }

    public function updateProfileImages($id,$image){
        $query = "UPDATE admins SET profile_image=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt,'si',$image,$id);
        return mysqli_stmt_execute($stmt);
    }

    public function updateloginAttept($id, $attempt){
        $query = "UPDATE admins SET login_attempt=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt,'ii',$attempt,$id);
        return mysqli_stmt_execute($stmt);
    }

    public function updateLastlogin($id){
        $query = "UPDATE admins SET last_login=now() WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt,'i',$id);
        return mysqli_stmt_execute($stmt);
    }

    public function LockAccout($id){
        $query = "UPDATE admins SET account_locked=1,lock_time=now() WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt,'i',$id);
        return mysqli_stmt_execute($stmt);
    }

    public function insertLoginHistory($admin_id,$ip,$status){
        $query = "INSERT INTO login_history (admin_id,login_time,ip_address,status) VALUES(?,now(),?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'iss',$admin_id,$ip,$status);
        return mysqli_stmt_execute($stmt);
    }

    public function activityLog($admin_id,$activity){
        $query = "INSERT INTO activity_logs (admin_id,activity) VALUES(?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'is',$admin_id,$activity);
        return mysqli_stmt_execute($stmt);
    }

    public function unlockAccout($id){
        $query = "UPDATE admins SET account_locked=0, login_attempt=0, lock_time=null WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }
}

?>