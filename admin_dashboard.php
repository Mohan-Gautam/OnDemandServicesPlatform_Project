<?php 
session_start(); 
// Security Check
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin') {
    header('Location: login.php');
}
require_once 'includes/db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2 style="text-align:center">Admin Panel</h2>
        <div style="text-align:right; margin-bottom:15px;">
            <a href="backend/auth.php?logout=true" class="btn-primary" style="background:#dc3545;">Logout</a>
        </div>

        <h3>Approve Technicians</h3>
        <?php if(isset($_GET['msg']) && $_GET['msg']=='approved') echo "<p class='success'>Technician Approved Successfully!</p>"; ?>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verification Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Get all technicians
                $sql = "SELECT * FROM users WHERE role='technician'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()): 
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <?php if($row['is_verified'] == 1): ?>
                                <span class="status-Verified">Verified</span>
                            <?php else: ?>
                                <span class="status-Pending">Pending Approval</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($row['is_verified'] == 0): ?>
                                <a href="backend/admin_actions.php?approve_id=<?php echo $row['id']; ?>" class="btn-success">Approve</a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php 
                    endwhile; 
                } else {
                    echo "<tr><td colspan='5' style='text-align:center'>No technicians found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>