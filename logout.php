<?php
session_start(); // bắt đầu phiên làm việc

// hủy tất cả các biến phiên
$_SESSION = array();

// nếu phiên được lưu trữ trong cookie, hủy cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// hủy phiên
session_destroy();

// chuyển hướng người dùng đến trang đăng nhập
header("Location: index.php");
exit;
?>