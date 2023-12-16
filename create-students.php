<?php
session_start();
error_reporting(0);
include('connect.php');

 

if(!isset($_SESSION['check']))
    {   
    header("Location: index.php"); 
    }
    else{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $msv = $_POST['msv'];
        $ho_lot = $_POST['ho_lot'];
        $ten = $_POST['ten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $mlcn = $_POST['mlcn'];
        // Thêm sinh viên vào bảng tbl_sinhvien trong CSDL
        try {
            $sql = "INSERT INTO tbl_sinhvien (msv, ho_lot, ten, sdt, email, mlcn) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$msv, $ho_lot, $ten, $sdt, $email, $mlcn]);
            $msg = "Bạn đã thêm sinh viên mới thành công";
        } catch (PDOException $e) {
            $error = "Có lỗi xảy ra khi sinh viên mới: " . $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>

<html lang="vi">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thêm mới sinh viên</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">

    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">

    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">

    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">

    <link rel="stylesheet" href="css/prism/prism.css" media="screen">

    <link rel="stylesheet" href="css/select2/select2.min.css">

    <link rel="stylesheet" href="css/main.css" media="screen">

    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #449d44;
        }

        .message {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>

</head>

 

<body class="top-navbar-fixed">

    <div class="main-wrapper">

 

        <!-- ========== TOP NAVBAR ========== -->

        <?php include('includes/topbar.php'); ?>

        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->

        <div class="content-wrapper">

            <div class="content-container">

 

                <!-- ========== LEFT SIDEBAR ========== -->

                <?php include('includes/leftbar.php'); ?>

                <!-- /.left-sidebar -->

 

                <div class="main-page">

                    <div class="container-fluid">

                        <div class="row page-title-div">

                            <div class="col-md-6">

                                <h2 class="title">Thêm mới sinh viên</h2>

                            </div>

                        </div>

                        <div class="row breadcrumb-div">

                            <div class="col-md-6">

                                <ul class="breadcrumb">

                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Trang chủ</a></li>

                                    <li>Thêm mới sinh viên</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="panel">

                                    <div class="panel-heading">

                                        <div class="panel-title">

                                            <h5>Thêm mới sinh viên</h5>

                                        </div>

                                    </div>

                                    <div class="panel-body">

                                        <?php if (isset($msg)) { ?>

                                            <div class="alert alert-success left-icon-alert" role="alert">

                                                <strong>Thành công!</strong> <?php echo htmlentities($msg); ?>

                                            </div>

                                        <?php } else if (isset($error)) { ?>

                                            <div class="alert alert-danger left-icon-alert" role="alert">

                                                <strong>Đã xảy ra lỗi!</strong> <?php echo htmlentities($error); ?>

                                            </div>

                                        <?php } ?>

                                        <form class="form-horizontal" method="post">

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Mã sinh viên</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="msv" class="form-control" id="default" placeholder="Mã sinh viên" required="required">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Họ-lót</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="ho_lot" class="form-control" id="default" placeholder="Họ-lót" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Tên</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="ten" class="form-control" id="default" placeholder="Tên" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Số điện thoại</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="sdt" class="form-control" id="default" placeholder="Số điện thoại" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="email" class="form-control" id="default" placeholder="Email" required="required">

                                                </div>

                                            </div>

                                             <div class="form-group">

                                                <label for="default" class="col-sm-2 control-label">Mã lớp cn</label>

                                                <div class="col-sm-10">

                                                    <input type="text" name="mlcn" class="form-control" id="default" placeholder="Mã lớp chuyên ngành" required="required">

                                                </div>

                                            </div>

 

                                            <div class="form-group">

                                                <div class="col-sm-offset-2 col-sm-10">

                                                <button type="submit" name="submit" class="btn btn-warning btn-labeled">Tạo mới<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.content-container -->

            </div>

            <!-- /.content-wrapper -->

        </div>

        <!-- /.main-wrapper -->

 

        <script src="js/jquery/jquery-2.2.4.min.js"></script>

        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>