<?php
// Include database connection and header
require '../config/database.php';
include 'includes/header.php';

try {
    $sql = "SELECT * FROM vendors";
    $stmt = $pdo->query($sql);
    $vendors = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<h1>Vendor List</h1>
<table border="1">
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Contact Information</th>
            <th>Specialization</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vendors as $vendor): ?>
        <tr>
            <td><?php echo htmlspecialchars($vendor['company_name']); ?></td>
            <td><?php echo htmlspecialchars($vendor['contact_info']); ?></td>
            <td><?php echo htmlspecialchars($vendor['specialization']); ?></td>
            <td><?php echo htmlspecialchars($vendor['location']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>
