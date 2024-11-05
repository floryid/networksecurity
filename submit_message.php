<?php
include 'db.php'; // Menghubungkan file koneksi

// Mengambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Menyimpan data ke database dengan prepared statements
$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    // Jika berhasil, redirect ke index.html
    header("Location: index.html");
    exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
} else {
    echo "Error: " . $stmt->error;
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>
