<?php
session_start();
$_SESSION[]= //username

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "";//delete query

if ($conn->query($sql) === TRUE) {
    session_destroy();
    header('Location: blogi.php');
    exit;
    
} else {
    echo "Error Deleting  profile: " . $conn->error;
}
?>