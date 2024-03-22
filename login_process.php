<?php
session_start(); // Bắt đầu phiên mới

include 'config.ini';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            header("Location: welcome.php"); // Chuyển hướng đến trang chào mừng
        } else {
            // Sai mật khẩu
            echo "Sai tên đăng nhập hoặc mật khẩu!";
        }
    } else {
        // Tên đăng nhập không tồn tại
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }
}

$conn->close();
?>
