<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: /bidbolt/app/controllers/login.php');
    exit();
}

$cache_file = '/mnt/data/vendor_performance_cache.json';
if (file_exists($cache_file)) {
    $vendor_performance = json_decode(file_get_contents($cache_file), true);
} else {
    $vendor_performance = [
        ['vendor' => 'Vendor 1', 'performance' => 4.5],
        ['vendor' => 'Vendor 2', 'performance' => 4.7],
    ];
    file_put_contents($cache_file, json_encode($vendor_performance));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cache Performance</title>
    <link rel="stylesheet" href="/bidbolt/public/css/assets/style.css">
</head>
<body>
    <?php include '../app/views/includes/header.php'; ?>
    <div class="cache-performance">
        <h1>Vendor Performance (Cached)</h1>
        <ul>
            <?php foreach ($vendor_performance as $vendor): ?>
                <li><?php echo $vendor['vendor']; ?>: <?php echo $vendor['performance']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php include '../app/views/includes/footer.php'; ?>
</body>
</html>
