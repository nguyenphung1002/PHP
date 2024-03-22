<?php
session_start(); // Bắt đầu phiên đã lưu

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Hiển thị thông tin người dùng
echo "Chào mừng " . $_SESSION['username'] . ", bạn đã đăng nhập với vai trò " . $_SESSION['role'];
?>
