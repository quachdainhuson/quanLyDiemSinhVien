<?php
    session_start();
    error_reporting(0);
    include('connect.php');
    $msv = $_GET['classid'];
    $sql = "DELETE FROM tbl_sinhvien WHERE msv = :msv";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':msv', $msv, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: update-students.php");

?>
