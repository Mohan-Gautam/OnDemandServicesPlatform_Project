<?php 
session_start(); 
// Security Check
if(!isset($_SESSION['role']) || $_SESSION['role']!='technician') {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
    <div class="container">
        <h1>This is Technician Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['name']; ?></p>
        <br>
        <a href="backend/auth.php?logout=true" class="btn-primary">Logout</a>
    </div>
</body>
</html>