<?php
    session_start();
    error_reporting(0);
    include('connect.php');
    $mhp = $_GET['mhp'];
    $sql = "DELETE FROM tbl_hocphan WHERE mhp = :mhp";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':mhp', $mhp, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: update-hocphan.php");

?>
