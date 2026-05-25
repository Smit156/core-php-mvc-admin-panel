# Secure Admin Management System

A professional Admin Authentication and Management System developed using Core PHP, MVC Architecture, MySQL, AJAX and Bootstrap.

---

# Features

## Authentication Features

- Admin Login
- AJAX Login System
- Secure Logout
- Session Management
- Password Hashing
- Forgot Password
- OTP Verification
- Change Password
- Create New Account

---

# Security Features

- Password Encryption
- Prepared Statements
- Session Security
- SQL Injection Protection
- OTP Expiry System

---

# Technologies Used

- Core PHP
- MVC Architecture
- MySQL
- AJAX
- jQuery
- Bootstrap 5
- HTML5
- CSS3
- JavaScript

---

# Project Structure

```text
admin/
│
├── application/
│   ├── controllers/
│   ├── model/
│   └── view/
│
├── config/
├── assets/
├── index.php
├── logout.php
├── send_otp.php
└── update_password.php
```

---

# Database Setup

## Create Database

```sql
CREATE DATABASE admin_system;
```

---

## Admin Table

```sql
CREATE TABLE admins(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    otp VARCHAR(10) NULL,
    otp_expiry DATETIME NULL
);
```

---

# Installation

1. Download or Clone Project

```bash
git clone https://github.com/your-username/secure-admin-management-system.git
```

2. Move project to XAMPP htdocs folder

```text
htdocs/project-folder
```

3. Import Database

4. Update Database Configuration

```php
config/database.php
```

5. Run Project

```text
http://localhost/project-folder
```

---

# Future Improvements

- Admin Profile
- Profile Image Upload
- User Management
- Role Management
- Dashboard Analytics
- Billing System
- REST API
- Email Verification

---

# Author

Smit Viradiya

---

# License

This project is developed for learning and portfolio purposes.
