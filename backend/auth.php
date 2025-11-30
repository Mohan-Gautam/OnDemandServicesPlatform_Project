<?php
session_start();
require_once '../includes/db.php';

// --- 1. REGISTRATION LOGIC ---
if (isset($_POST['register'])) {
    $name = $_POST['name']; 
    $user = $_POST['username']; 
    $email = $_POST['email']; 
    $pass = md5($_POST['password']); 
    $role = $_POST['role'];
    $phone = $_POST['phone']; 
    $addr = $_POST['address'];
    
    // Default verification: Technicians = 0 (Pending), Users = 1 (Verified)
    $verified = ($role == 'technician') ? 0 : 1;

    $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, phone, address, role, is_verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $name, $user, $email, $pass, $phone, $addr, $role, $verified);
    
    if ($stmt->execute()) {
        $msg = ($role == 'technician') ? 'wait_approval' : 'registered';
        header("Location: ../login.php?msg=$msg");
        exit();
    } else {
        header('Location: ../register.php?err=failed');
        exit();
    }
}

// --- 2. LOGIN LOGIC (The part causing your issue) ---
if (isset($_POST['login'])) {
    $user = $_POST['username']; 
    $pass = md5($_POST['password']);

    // Check database for matching user AND password
    $res = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");

    if ($res->num_rows == 1) {
        // --- SUCCESS: CREDENTIALS FOUND ---
        $row = $res->fetch_assoc();
        
        // 1. Check if Technician is approved
        if($row['role'] == 'technician' && $row['is_verified'] == 0) {
            header('Location: ../login.php?err=not_verified');
            exit();
        }

        // 2. Set Session Variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];

        // 3. Redirect based on Role
        if ($row['role'] == 'admin') header('Location: ../admin_dashboard.php');
        elseif ($row['role'] == 'technician') header('Location: ../tech_dashboard.php');
        else header('Location: ../user_dashboard.php');
        exit();
        
    } else {
        // --- FAILURE: FALSE CREDENTIALS ---
        // This is the part responsible for redirecting you back if password is wrong.
        header('Location: ../login.php?err=invalid');
        exit();
    }
}

// --- 3. LOGOUT LOGIC ---
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit();
}
?>