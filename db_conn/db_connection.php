<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qldsv_db";

$conn = new mysqli($hostname, $username, $password,$dbname);

if ($conn->connect_error) {
    echo 'Kết Nối Thất Bại!' . $conn->connect_error;
}
?>