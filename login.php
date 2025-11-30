<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="auth-container">
        <h2 style="text-align:center">Login</h2>

        <!-- --- FIX START: MESSAGE DISPLAY LOGIC --- -->
        <?php
        // Success Messages
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == 'registered') {
                echo '<p class="success">Registration successful! Please Login.</p>';
            }
            if ($_GET['msg'] == 'wait_approval') {
                echo '<p class="error" style="color:orange">Account created! Please wait for Admin approval.</p>';
            }
        }

        // Error Messages
        if (isset($_GET['err'])) {
            if ($_GET['err'] == 'invalid') {
                echo '<p class="error">Invalid Username or Password.</p>';
            }
            if ($_GET['err'] == 'not_verified') {
                echo '<p class="error">Your account is not approved yet.</p>';
            }
            if ($_GET['err'] == 'empty') {
                echo '<p class="error">Please fill in all fields.</p>';
            }
        }
        ?>
        <!-- --- FIX END --- -->

        <form action="backend/auth.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn-primary btn-block">Login</button>
        </form>
        <p style="text-align:center"><a href="register.php">Create Account</a></p>
    </div>
</body>
</html>