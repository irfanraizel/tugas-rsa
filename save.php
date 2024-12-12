<?php

include("function.php");

// Database connection info
$servername = "localhost"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "tugas_rsa";     // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if (isset($_POST['submit'])) {
    $ref = $_POST['no_ref'];
    $rek = json_encode(encrypt($_POST['no_rek'], $public_key)); // Encrypt account number
    $nama = json_encode(encrypt($_POST['nama'], $public_key)); // Encrypt name
    $nominal = $_POST['nominal'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO transaksi (no_ref, no_rekening, nama, nominal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $ref, $rek, $nama, $nominal);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan.')window.location.href='index.php'
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
