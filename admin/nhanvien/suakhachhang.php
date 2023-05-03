<?php
ob_start();
?>
<?php 
 include "head.php";
?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php 
 include "Header.php";
?> 
    <?php 
 include "aside.php";
?>
    <div class="content-wrapper">
    <?php
   require '../../inc/config.php';
   $sdt = $_GET["Sdt"];
   $query="SELECT Sdt, Matkhau, Tenkhach, Diachi from khachhang
	WHERE Sdt LIKE '". $sdt ."';";
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Sửa
            <small>Thông tin khách hàng</small>
          </h1>
        </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-info">
                        <form class="form-horizontal"  method="POST" action="<?php include 'xulysuakhachhang.php'?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $row["Sdt"] ?>" required disabled>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pass" value="<?php echo $row["Matkhau"] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên Khách hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="<?php echo $row["Tenkhach"] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" value="<?php echo $row["Diachi"] ?>" required>
                                    </div>
                                </div>
                                
                                <div class="box-footer">
                                    <a href="qlykhachhang.php"><button type="button" name="cancel" class="btn btn-default">Hủy</button></a>
                                    <button type="submit" name="Edit" class="btn btn-info pull-right">Lưu lại</button>
                                </div>
                            </div>
                        </form>
                        
        </section>
        
        
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {

        CKEDITOR.replace('editor1');

        $(".textarea").wysihtml5();
      });
    </script>

    <script src="dist/js/demo.js"></script>
  </body>
  
</html>
<?php ob_end_flush(); ?>