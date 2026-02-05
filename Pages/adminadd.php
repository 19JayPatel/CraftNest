<?php
include 'connection.php';

$username = 'jay';
$password = password_hash('jay19', PASSWORD_DEFAULT); 

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
$conn->query($sql);

echo "Admin user created!";
?>
