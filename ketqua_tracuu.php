<?php
session_start();
error_reporting(0);
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KẾT QUẢ TRA CỨU</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate-css/animate.min.css">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css">
    <link rel="stylesheet" href="css/prism/prism.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>

<body>
    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-12">
                                <h2 class="title text-center">KẾT QUẢ TRA CỨU</h2>
                            </div>
                        </div>
                    </div>

                    <section class="section" id="exampl">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h3 class="text-center">Điểm Học Phần</h3>
                                                <hr />
                                            </div>
                                        </div>

                                        <div class="panel-body p-20">
                                            <?php
                                            $msv = $_POST["msv"];
                                            $mhp = $_POST["mhp"];

                                            $_SESSION["msv"] = $msv;
                                            $_SESSION["mhp"] = $mhp;

                                            $sql = "SELECT sv.msv, sv.ho_lot, sv.ten, hp.mhp, hp.ten_hoc_phan, dhp.A, dhp.B, dhp.C FROM tbl_sinhvien AS sv INNER JOIN tbl_hocphan AS hp INNER JOIN tbl_diemhocphan AS dhp WHERE sv.msv=:msv AND hp.mhp=:mhp AND sv.msv=dhp.msv AND hp.mhp=dhp.mhp";

                                            $cmd = $dbh->prepare($sql);
                                            $cmd->bindParam(':msv', $msv);
                                            $cmd->bindParam(':mhp', $mhp);
                                            $cmd->execute();

                                            $rlt = $cmd->fetchAll(PDO::FETCH_OBJ);

                                            if ($cmd->rowCount() > 0 || $ms != "") {
                                                foreach ($rlt as $r) {
                                            ?>
                                                    <p>
                                                        <b>Sinh viên :</b>
                                                        <?php echo htmlentities($r->ho_lot); ?>
                                                        <?php echo htmlentities($r->ten); ?>
                                                    </p>
                                                    <p>
                                                        <b>Mã sinh viên :</b>
                                                        <?php echo htmlentities($r->msv); ?>
                                                    </p>
                                        </div>

                                        <!-- bảng điểm -->
                                        <div class="panel-body p-20">
                                            <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <td style="text-align: center"><?php echo htmlentities($r->ten_hoc_phan); ?></td>
                                                        <th style="text-align: center">A</th>
                                                        <th style="text-align: center">B</th>
                                                        <th style="text-align: center">C</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="text-align: left; vertical-align : middle;">
                                                            Điểm Thành Phần
                                                        </th>
                                                        <td style="text-align: center"><?php echo htmlentities($r->A); ?></td>
                                                        <td style="text-align: center"><?php echo htmlentities($r->B); ?></td>
                                                        <td style="text-align: center"><?php echo htmlentities($r->C); ?></td>
                                                    <tr>
                                                        <th scope="row" colspan="" style="text-align: left">Điểm học phần - số</th>
                                                        <td style="text-align: center" colspan='3'>
                                                            <b>
                                                                <?php
                                                                $dhp = ($r->C * 0.1) + ($r->B * 0.3) + ($r->A * 0.6);
                                                                echo htmlentities($dhp);
                                                                ?>
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" colspan="" style="text-align: left">Điểm học phần - chữ</th>
                                                        <td style="text-align: center" colspan='3'>
                                                            <b>
                                                                <?php
                                                                if ($dhp < 4) {
                                                                    echo  htmlentities("F");
                                                                } elseif ($dhp >= 4 and $dhp <= 5.4) {
                                                                    echo  htmlentities("D");
                                                                } elseif ($dhp >= 5.5 and $dhp <= 6.9) {
                                                                    echo  htmlentities("C");
                                                                } elseif ($dhp >= 7 and $dhp <= 8.4) {
                                                                    echo  htmlentities("B");
                                                                } else {
                                                                    echo  htmlentities("A");
                                                                }
                                                                ?>
                                                            </b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php
                                                }
                                            } else if ($msv == "") {
                                            ?>
                                            <div class="alert alert-warning left-icon-alert" role="alert">
                                                <strong>Chú ý:</strong> Bạn chưa nhập mã sinh viên!
                                            </div>
                                        <?php
                                            } else {
                                                echo "<div class='alert alert-warning left-icon-alert' role='alert'>
                                                <strong>Chú ý:</strong> Bạn chưa có điểm học phần này!
                                              </div>";
                                            }
                                        ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <a href="tra_cuu.php"> << Quay lại </a>
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

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
</body>

</html>
