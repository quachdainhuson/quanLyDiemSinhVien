<?php 
session_start();
include('connect.php');
if(isset($_SESSION['ulog'])){
  echo 'Xin Chào!';
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>-- HỆ THỐNG QUẢN LÍ ĐIỂM SINH VIÊN --</title>

  <!-- favico -->
  <link rel="icon" type="image/x-icon" href="img/it-humg-favicon.ico">

  <!-- css -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
  <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
  <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen">
  <link rel="stylesheet" href="css/icheck/skins/line/blue.css">
  <link rel="stylesheet" href="css/icheck/skins/line/red.css">
  <link rel="stylesheet" href="css/icheck/skins/line/green.css">
  <link rel="stylesheet" href="css/main.css" media="screen">

</head>

<body class="top-navbar-fixed">
  <!-- html -->
  <div class="main-wrapper">
    <?php include('includes/nav_bar.php'); ?>

    <div class="content-wrapper">
      <div class="content-container">
        <?php include('includes/left_sidebar_unlog.php'); ?>
        <div class='main-page'>
        <div class="main-wrapper">
        <div class="login-bg-color bg-white-300">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel login-box">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <h4>Tra Cứu Điểm Theo Học Phần</h4>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form action="ketqua_tracuu.php" method="post">
                                <div class="form-group">
                                    <label for="rollid">Nhập mã sinh viên</label>
                                    <input type="text" class="form-control" id="rollid" placeholder="Mã sinh viên" autocomplete="off" name="msv">
                                </div>
                                <div class="form-group">
                                    <label for="default">Học phần</label>
                                    <select name="mhp" class="form-control" id="default" required="required">
                                        <option value="">-- Chọn học phần --</option>
                                        <?php 
                                            $sql = "SELECT * FROM tbl_hocphan";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            if($query->rowCount() > 0){
                                                foreach($results as $result){   
                                                    echo '<option value="'.htmlentities($result->mhp).'">'.
                                                         htmlentities($result->mhp).' - '.htmlentities($result->ten_hoc_phan).'</option>';
                                                }
                                            } 
                                        ?>
                                        <option value="*">-- Tất cả các học phần --</option>
                                    </select>
                                </div>

                                <div class="form-group mt-20">
                                    <div class="">                                   
                                        <button type="submit" class="btn btn-success btn-labeled pull-right">
                                            Tra Cứu
                                            <span class="btn "><i class="fa fa-angle"></i></span>
                                        </button>
                                    </div>
                                </div>                                    
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->
    </div>
        </div>
      </div>
    </div>
  </div>

  <!-- cửa sổ đăng nhập -->
  <?php 
  include('includes/logs/login_modal.php');
  ?>


  <!-- js lib -->
  <script src="js/modernizr/modernizr.min.js"></script>

  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <script src="js/jquery-ui/jquery-ui.min.js"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/pace/pace.min.js"></script>
  <script src="js/lobipanel/lobipanel.min.js"></script>
  <script src="js/iscroll/iscroll.js"></script>

  <script src="js/prism/prism.js"></script>
  <script src="js/waypoint/waypoints.min.js"></script>
  <script src="js/counterUp/jquery.counterup.min.js"></script>
  <script src="js/amcharts/amcharts.js"></script>
  <script src="js/amcharts/serial.js"></script>
  <script src="js/amcharts/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
  <script src="js/amcharts/themes/light.js"></script>
  <script src="js/toastr/toastr.min.js"></script>
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/main.js"></script>
  <script src="js/production-chart.js"></script>
  <script src="js/traffic-chart.js"></script>
  <script src="js/task-list.js"></script>
  <script>
    $(function() {
      // Counter for dashboard stats
      $('.counter').counterUp({
        delay: 10,
        time: 1000
      });

      // Welcome notification
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr["success"]("Chào mừng đến với hệ thống quản lí học tập sinh viên !");
    });
  </script>
    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/icheck/icheck.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
        $(function(){
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-red'
            });
        });
    </script>
</body>
<?php 
}
?>
</html>
