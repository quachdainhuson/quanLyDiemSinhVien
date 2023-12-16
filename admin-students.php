<?php
    session_start();
    error_reporting(0);
    // lấy id của sinh viên
    $id = $_GET['classid'];
    include('connect.php');

    $sql_2 = "SELECT * from tbl_sinhvien where msv = :id";
    $query_2 = $dbh->prepare($sql_2);
    $query_2->bindParam(':id', $id, PDO::PARAM_STR);
    $query_2->execute();
    $student = $query_2->fetchAll(PDO::FETCH_OBJ);

    $sql_lcn = "SELECT * from tbl_lopchuyennghanh";
    $query_lcn = $dbh->prepare($sql_lcn);
    $query_lcn->execute();
    $results_lcn = $query_lcn->fetchAll(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhập thông tin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>
<body class="top-navbar-fixed">
<div class="main-wrapper">
    <?php include('includes/topbar.php'); ?>
    <div class="content-wrapper">
        <div class="content-container">
            <?php include('includes/leftbar.php'); ?>
            <div class="main-page">
                <div class="container-fluid">
                    <div class="row page-title-div">
                        <div class="col-md-6">
                            <h2 class="title">Cập nhập sinh viên</h2>
                        </div>
                    </div>
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href = "#"> Classes</a></li>
                                <li class="active"><a>Quản lý sinh viên</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Cập nhật thông tin sinh viên</h5>
                                        </div>
                                    </div>
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } else if ($error) { ?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="panel-body p-20">
                                        <form method="post" action="update_student_process.php?classid=<?=$student[0]->msv;?>">
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Mã sinh viên: </label>
                                                <div class="">
                                                    <input type="text" name="msv" class="form-control" required="required" value="<?=$student[0]->msv;?>" id="success" disabled>
                                                    <span class="help-block">Bắt buộc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Họ-lót: </label>
                                                <div class="">
                                                    <input type="text" name="ho_lot" class="form-control" required="required" value="<?=$student[0]->ho_lot;?>" id="success">
                                                    <span class="help-block">Bắt buộc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Tên: </label>
                                                <div class="">
                                                    <input type="text" name="ten" class="form-control" required="required" value="<?=$student[0]->ten;?>" id="success">
                                                    <span class="help-block">Bắt buộc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Số điện thoại: </label>
                                                <div class="">
                                                    <input type="text" name="sdt" class="form-control" required="required" value="<?=$student[0]->sdt;?>" id="success">
                                                    <span class="help-block">Bắt buộc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Email: </label>
                                                <div class="">
                                                    <input type="text" name="email" class="form-control" required="required" value="<?=$student[0]->email;?>" id="success">
                                                    <span class="help-block">Bắt buộc</span>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="success" class="control-label">Mã lớp chuyên ngành: </label>
                                                <div class="">
                                                    <select name="mlcn" class="form-control" required="required">
                                                        <?php foreach ($results_lcn as $result_lcn) { ?>
                                                            <option value="<?=$result_lcn->mlcn;?>" <?php if ($result_lcn->mlcn == $student[0]->mlcn) echo 'selected'; ?>><?=$result_lcn->mlcn;?></option>
                                                            <option value="<?=$result_lcn->mlcn;?>"><?=$result_lcn->mlcn;?></option>
                                                        <?php } ?>
                                                        <span class="help-block">Bắt buộc</span>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <div class="">
                                                    <button type="submit" name="submit" class="btn btn-success btn-labeled">Cập nhập<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>
<script src="js/main.js"></script>
<script>
    $(function($) {
        $('#example').DataTable();
        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });
        $('#example3').DataTable();
    });
</script>
</body>
</html>