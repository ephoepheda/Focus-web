<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and clean input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dept = $conn->real_escape_string($_POST['department']);
    $year = $conn->real_escape_string($_POST['year']);

    // Prepare SQL statement to prevent security issues (SQL Injection)
    $stmt = $conn->prepare("INSERT INTO members (full_name, email, department, study_year) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $dept, $year);

    if ($stmt->execute()) {
        // Redirect back to home with a success status
        echo "<script>
                alert('Thank you " . $name . "! You have successfully joined.');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

    


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and clean input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dept = $conn->real_escape_string($_POST['department']);
    $year = $conn->real_escape_string($_POST['year']);

    // Prepare SQL statement to prevent security issues (SQL Injection)
    $stmt = $conn->prepare("INSERT INTO members (full_name, email, department, study_year) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $dept, $year);

    if ($stmt->execute()) {
        // Redirect back to home with a success status
        echo "<script>
                alert('Thank you " . $name . "! You have successfully joined.');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>