<?php
session_start(); // bắt đầu phiên làm việc
include('connect.php');
if(isset($_POST["submit"]))
{
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql ="SELECT email, mat_khau FROM tbl_dangnhap WHERE email=:uname and mat_khau=:password";
    
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();

    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        $_SESSION['check']=true;
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{
      echo "<script>
      alert('Đăng nhập thất bại!');
      history.back();
    </script>";
        // header('location:index.php');
    }
}
?>