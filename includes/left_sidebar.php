<!--
  GIAO DIỆN KHI CHƯA ĐĂNG NHẬP
-->
<div class="left-sidebar bg-black-300 box-shadow ">
  <div class="sidebar-content">
    <!-- NGƯỜI ĐĂNG NHẬP -->
    <?php
    include('includes/left_sidebar_comp/user_info.php');
    ?>

    <div class="sidebar-nav">
      <ul class="side-nav color-gray">
        <!-- CATEGORY: THỐNG TIN -->
        <?php
        include('includes/left_sidebar_comp/category_thong_tin.php');
        ?>


        <!-- CATEGORY: QUẢN LÍ -->
        <?php
        include('includes/left_sidebar_comp/category_quan_li.php');
        ?>

        <!-- CATEGORY: TÀI NGUYÊN -->
        <?php
        include('includes/left_sidebar_comp/category_tai_nguyen.php');
        ?>

        <!-- CATEGORY: THIẾT LẬP -->
        <?php
        include('includes/left_sidebar_comp/category_thiet_lap.php');
        ?>

      </ul>
    </div>
    <!-- /.sidebar-nav -->
  </div>
  <!-- /.sidebar-content -->
</div>