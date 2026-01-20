<?php
session_start();
include("../Database/Database.php");

// create database object
$db = new Database();
$connection = $db->connection;   // get mysqli connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $connection->prepare("SELECT id, username, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // plain text check (NOT secure)
        if ($password === $row['password']) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['username'];

            header("Location: ../Admin/dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid Password";
        }
    } else {
        $_SESSION['error'] = "Invalid Username";
    }

    header("Location: ../Admin/login.php");
    exit();
}
?>
