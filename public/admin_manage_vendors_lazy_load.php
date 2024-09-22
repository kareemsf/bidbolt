<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /bidbolt/app/controllers/login.php');
    exit();
}

// Simulating a batch of vendor data (normally fetched from the database)
$vendors_batch = [
    ['id' => 1, 'name' => 'Vendor 1', 'specialization' => 'Construction'],
    ['id' => 2, 'name' => 'Vendor 2', 'specialization' => 'Electrical'],
    // More vendors loaded dynamically...
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vendors (Lazy Load)</title>
    <link rel="stylesheet" href="/bidbolt/public/css/assets/style.css">
    <script>
        let currentPage = 1;
        function loadMore() {
            currentPage++;
            let vendorsList = document.getElementById('vendors-list');
            vendorsList.innerHTML += `
                <tr><td>Vendor ${currentPage * 2 + 1}</td><td>Specialization ${currentPage * 2 + 1}</td></tr>
                <tr><td>Vendor ${currentPage * 2 + 2}</td><td>Specialization ${currentPage * 2 + 2}</td></tr>
            `;
        }
    </script>
</head>
<body>
    <?php include '../app/views/includes/header.php'; ?>
    <div class="manage-vendors">
        <h1>Manage Vendors (Lazy Load)</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                </tr>
            </thead>
            <tbody id="vendors-list">
                <?php foreach ($vendors_batch as $vendor): ?>
                    <tr>
                        <td><?php echo $vendor['id']; ?></td>
                        <td><?php echo $vendor['name']; ?></td>
                        <td><?php echo $vendor['specialization']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="loadMore()">Load More</button>
    </div>
    <?php include '../app/views/includes/footer.php'; ?>
</body>
</html>
