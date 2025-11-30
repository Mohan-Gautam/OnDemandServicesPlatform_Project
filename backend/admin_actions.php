<?php
require_once '../includes/db.php';

if (isset($_GET['approve_id'])) {
    $id = $_GET['approve_id'];
    
    // Update the user to Verified (1)
    $sql = "UPDATE users SET is_verified=1 WHERE id='$id'";
    
    if($conn->query($sql)) {
        header('Location: ../admin_dashboard.php?msg=approved');
    } else {
        die("Error approving technician");
    }
}
?>