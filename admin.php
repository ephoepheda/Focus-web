<?php
include 'db.php'; // Connect to database

// Fetch all members
 $sql = "SELECT * FROM members ORDER BY joined_at DESC";
 $result = $conn->query($sql);
?>

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - FOCUS AMU</title>
    <!-- Using Bootstrap for quick nice table styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Registered Members</h2>
    <a href="index.html" class="btn btn-primary mb-3">Back to Website</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Year</th>
                <th>Date Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . htmlspecialchars($row["full_name"]) . "</td>
                            <td>" . htmlspecialchars($row["email"]) . "</td>
                            <td>" . htmlspecialchars($row["department"]) . "</td>
                            <td>" . $row["study_year"] . "</td>
                            <td>" . $row["joined_at"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No members found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div style="text-align: center; margin-top: 30px;">
    <a href="logout.php" class="btn" style="background: #e74c3c; text-decoration: none;">Logout</a>
</div>

</body>
</html>