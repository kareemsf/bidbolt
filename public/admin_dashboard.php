<?php include '../views/includes/header.php'; ?>

<div class="admin-dashboard">
    <h1>Welcome, Admin</h1>
    <h2>Dashboard Overview</h2>
    <p>Total Users: 2</p>
    <p>Total Vendors: 1</p>
</div>

<div class="admin-actions">
    <h3>Admin Actions:</h3>
    <ul>
        <li><a href='vendor_list.php'>Manage Vendors</a></li>
        <li><a href='user_list.php'>Manage Users</a></li>
        <li><a href='../controllers/logout.php'>Logout</a></li>
    </ul>
</div>

<?php include '../views/includes/footer.php'; ?>
