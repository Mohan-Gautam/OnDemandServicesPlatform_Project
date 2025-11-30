<?php
require_once '../includes/db.php';

if(isset($_POST['username'])) {
    $u = $conn->real_escape_string($_POST['username']);
    $res = $conn->query("SELECT id FROM users WHERE username='$u'");
    if ($res->num_rows > 0) echo "<span class='error'>Username Taken</span>";
    else echo "<span class='success'>Available</span>";
}

if(isset($_POST['email'])) {
    $e = $conn->real_escape_string($_POST['email']);
    $res = $conn->query("SELECT id FROM users WHERE email='$e'");
    if ($res->num_rows > 0) echo "<span class='error'>Email Registered</span>";
    else echo "<span class='success'>Available</span>";
}
?>