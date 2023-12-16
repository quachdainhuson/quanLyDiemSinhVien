<?php
session_start();
error_reporting(0);

include('connect.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {

    $msg = $error = '';
    if (isset($_POST['submit'])) {
        $msv = $_GET['classid'];
        $ho_lot = $_POST['ho_lot'];
        $ten = $_POST['ten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $mlcn = $_POST['mlcn'];
        require 'connect.php';
        $sql = "UPDATE tbl_sinhvien SET ho_lot = :ho_lot, ten = :ten, sdt = :sdt, email = :email, mlcn = :mlcn WHERE msv = :msv";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':ho_lot', $ho_lot, PDO::PARAM_STR);
        $stmt->bindParam(':ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':sdt', $sdt, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mlcn', $mlcn, PDO::PARAM_STR);
        $stmt->bindParam(':msv', $msv, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header("Location: update-students.php");
            $msg = "Bạn đã sửa thông thành công!";

        } else {
            $error = "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>
