<?php
// controllers/add_vendor.php
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];
    $contact_info = $_POST['contact_info'];
    $specialization = $_POST['specialization'];
    $location = $_POST['location'];

    $sql = "INSERT INTO vendors (company_name, contact_info, specialization, location) 
            VALUES (:company_name, :contact_info, :specialization, :location)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['company_name' => $company_name, 'contact_info' => $contact_info, 
                        'specialization' => $specialization, 'location' => $location])) {
        echo "Vendor added successfully!";
    } else {
        echo "Error adding vendor!";
    }
}
?>

<?php include '../views/includes/header.php'; ?>

<h2>Add Vendor</h2>
<form method="POST" action="">
    <label>Company Name:</label>
    <input type="text" name="company_name" required><br>
    <label>Contact Info:</label>
    <input type="text" name="contact_info" required><br>
    <label>Specialization:</label>
    <input type="text" name="specialization" required><br>
    <label>Location:</label>
    <input type="text" name="location" required><br>
    <button type="submit">Add Vendor</button>
</form>

<?php include '../views/includes/footer.php'; ?>
