<?php
ob_start();
?>
<?php 
 include "head.php";
?>

  <body class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper" >
    <?php 
 include "Header.php";
?>
      
<?php 
 include "aside.php";
?>
   <div class="content-wrapper" style="min-height: 901px; background-color: #1a2226">
        
        <section class="content-header">
          <h1 style="color: white">
           Trang quản trị của Nhân viên
          </h1>
        </section>

        <section class="content">
          <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                  <div class="inner">
                  <h3>Quản lý</h3>
                    <p>Danh mục</p>
                  </div>
                  <div class="icon">
                    <i class="ion-ios-home"></i>
                  </div>
                  <a href="qlydanhmuc.php" class="small-box-footer">Xem Danh Sách <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Sản phẩm</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="qlysanpham.php" class="small-box-footer">Xem Danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Đơn hàng</p>
                </div>
                <div class="icon">
                  <i class="ion-printer"></i>
                </div>
                <a href="qlydonhang.php" class="small-box-footer">Xem Danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-orange">
                <div class="inner">
                <h3>Quản lý</h3>
                  <p>Khách hàng</p>
                </div>
                <div class="icon">
                  <i class="ion-person-stalker"></i>
                </div>
                <a href="qlykhachhang.php" class="small-box-footer">Xem Danh Sách <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </section>
      </div>
      <?php 
 include "footer.php";
?>

<?php 
 include "script.php";
?>
</body>
 
</html>
<!-- <?php ob_end_flush(); ?> -->
