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
}

?>