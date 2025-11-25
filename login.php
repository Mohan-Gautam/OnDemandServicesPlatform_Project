<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="assets/css/style.css"></head>
<body>
    <div class="auth-container">
        <h2 style="text-align:center;">Login</h2> 
        <form action="backend" method="post">
            <div class="form-group"><label>Username</label><input type="text" name="username" required></div>
            <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
            <button type="submit" name="login" class="btn-primary btn-block">Login</button>
        </form>
        <p style="text-align:center;"><a href="register.php">Create Account</a></p>
    </div>
</body>
</html>