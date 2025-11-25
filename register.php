<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- place for ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="auth-container">
        <h2 style="text-align:center;">Register</h2>
        <form action="backend/auth.php" method="post" autocomplete="off">
            <div class="form-group">
                <label>Role</label>
                <select name="role">
                    <option value="user">User (Customer)</option>
                    <option value="technician">Technician</option>
                </select>
            </div>
            <div class="form-group"><label>Name</label><input type="text" name="name" required></div>
            
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="reg_username" required>
                <div id="err_username"></div>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="reg_email" required>
                <div id="err_email"></div>
            </div>
            
            <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
            <div class="form-group"><label>Phone</label><input type="text" name="phone" required></div>
            <div class="form-group"><label>Address</label><textarea name="address" required></textarea></div>
            
            <button type="submit" name="register" class="btn-primary btn-block">Register</button>
        </form>
        <p style="text-align:center;"><a href="login.php">Login here</a></p>
    </div>
</body>
</html>