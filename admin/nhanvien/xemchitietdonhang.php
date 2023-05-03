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
   $id = $_GET["id"];
   $query="SELECT a.ID_Donhang, b.Tennhanvien, a.Sdtkhach, a.Ngaymua, a.Diachi, a.Tongtien, a.Trangthaidonhang, c.ID_Sanpham, c.Dongia, d.Tensanpham, c.Soluong, c.Thanhtien, e.Tenkhach
   from donhang as a
   INNER JOIN  nhanvienbanhang as b on a.ID_Nhanvien = b.ID_Nhanvienbanhang
   INNER JOIN  chitietdonhang as c on a.ID_Donhang = c.ID_Donhang
   INNER JOIN  sanpham as d on c.ID_Sanpham = d.ID_Sanpham
   INNER JOIN  khachhang as e on a.Sdtkhach = e.Sdt
   WHERE  a.ID_Donhang =".$id;
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Xem
            <small>Thông tin đơn hàng</small>
          </h1>
        </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                    <div class="box box-info">
                        <form class="form-horizontal"  method="POST" action="<?php include 'xulysuadonhang.php'?>" enctype="multipart/form-data">
                            <div class="box-body">
                            <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">ID Đơn hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id" value="<?php echo $row["ID_Donhang"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên nhân viên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="<?php echo $row["Tennhanvien"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại khách hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $row["Sdtkhach"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên khách hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $row["Tenkhach"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ giao hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" value="<?php echo $row["Diachi"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tổng giá trị đơn hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="money" value="<?php echo $row["Tongtien"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Trạng thái đơn hàng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="status" value="<?php echo $row["Trangthaidonhang"] ?>" required disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>  
                                            <?php
                                                require '../../inc/config.php';
                                                $sql="SELECT b.Tensanpham, a.Soluong, a.Dongia, a.Thanhtien
                                                from chitietdonhang as a
                                                INNER JOIN  sanpham as b on a.ID_Sanpham = b.ID_Sanpham
                                                INNER JOIN  donhang as c on a.ID_Donhang = c.ID_Donhang
                                                WHERE  a.ID_Donhang =".$id; 
                                                $result = $conn->query($sql); 
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    
                                            ?> 
                                                <tr>           
                                                <td ><?php echo $row["Tensanpham"] ?></a></td>
                                                <td ><?php echo $row["Soluong"] ?></a></td>
                                                <td ><?php echo $row["Dongia"] ?></a></td>
                                                <td ><?php echo $row["Thanhtien"] ?></a></td>
                                                <td ></td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </tbody>                   
                                        </table>
                                        
                                        <div class="box-footer">
                                        <a href="qlydonhang.php"><button type="button" name="cancel" class="btn btn-default">Quay lại</button></a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
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