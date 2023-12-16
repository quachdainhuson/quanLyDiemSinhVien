<?php
error_reporting(E_ALL);
include('includes/config.php');
$msg = $error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $msv = $_POST['msv'];
    $a = $_POST['diema'];
    $b = $_POST['diemb'];
    $c = $_POST['diemc'];
    $mhp = $_POST['mhp'];
    // Kiểm tra xem mã sinh viên có tồn tại không
    $checkStudent = "SELECT * FROM tbl_sinhvien WHERE msv = ?";
    $checkSql = "SELECT COUNT(*) as count FROM tbl_diemhocphan WHERE msv = ? AND mhp =? ";
    $checkStmt_1 = $dbh->prepare($checkStudent);
    $checkStmt_2 = $dbh->prepare($checkSql);
    $checkStmt_1->execute([$msv]);
    $checkStmt_2->execute([$msv, $mhp]);
    $student = $checkStmt_1->fetch();
    $result = $checkStmt_2->fetch();

    if ($subject || $result["count"]==0) {
        // Nếu sinh viên tồn tại, thực hiện xoá
        try {
            $sql = "INSERT INTO tbl_diemhocphan(msv, a, b, c, mhp) VALUES (?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);

            if($stmt->execute([$msv, $a, $b, $c, $mhp])) {
                $msg = "Thêm thành công";
            } else {
                $msg = "Thêm thất bại";
            }
        } catch (PDOException $e) {
            $error = "Xảy ra lỗi khi thêm điểm: " . $e->getMessage();
        }
    } else {
        $error = "Mã sinh viên không tồn tại hoặc đã tồn tại điểm ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete subject</title>
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
<h2 class="title">Delete Subject</h2>
</div>
</div>
<div class="row breadcrumb-div">
<div class="col-md-6">
<ul class="breadcrumb">
<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
<li> <a href = "#">Quản lý học phần</a></li>
<li class="active"><a href = "#">Thêm điểm</a></li>
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
<h5>Thêm điểm </h5>
</div>
</div>
<?php if ($msg) { ?>
            <div class="alert alert-success left-icon-alert" role="alert">
                <strong>Thành công!</strong> <?php echo htmlentities($msg); ?>
            </div>
        <?php } else if ($error) { ?>
            <div class="alert alert-danger left-icon-alert" role="alert">
                <strong>Đã có lỗi xảy ra!</strong> <?php echo htmlentities($error); ?>
            </div>
        <?php } ?>
        <div class="panel-body p-20">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="rollid">Nhập mã sinh viên</label>
                <input type="text" class="form-control" id="rollid" placeholder="Mã sinh viên" autocomplete="off" name="msv">
            </div>
            <div class="form-group">
                <label for="rollid">Nhập điểm A</label>
                <input type="number" class="form-control" min="0" max="10" id="rollid" placeholder="Nhập điểm A" autocomplete="off" name="diema">
            </div>
            <div class="form-group">
                <label for="rollid">Nhập điểm B</label>
                <input type="number" class="form-control" min="0" max="10" id="rollid" placeholder="Nhập điểm B" autocomplete="off" name="diemb">
            </div>
            <div class="form-group">
                <label for="rollid">Nhập điểm C</label>
                <input type="number" class="form-control" min="0" max="10" id="rollid" placeholder="Nhập điểm C" autocomplete="off" name="diemc">
            </div>
            <div class="form-group">
            <label for="default">Học phần</label>
            <select name="mhp" class="form-control" id="default" required="required">
                <option value="">-- Chọn học phần --</option>
                    <?php 
                        $sql = "SELECT * from tbl_hocphan";

                        $query = $dbh->prepare($sql);
                        $query->execute();

                        $results=$query->fetchAll(PDO::FETCH_OBJ);

                        if($query->rowCount() > 0){
                            foreach($results as $result){   
                    ?>
                    <option value="<?php echo htmlentities($result->mhp); ?>"><?php echo htmlentities($result->mhp); ?>&nbsp;-&nbsp;<?php echo htmlentities($result->ten_hoc_phan); ?></option>
                    <?php
                        }
                    } 
                    ?>
                </select>
            </div>
            
                <div class="form-group has-success">
                    <div class="">
                        <button type="submit" name="submit" class="btn btn-success btn-labeled">Chọn<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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