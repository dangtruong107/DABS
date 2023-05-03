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
      <section class="content-header">
          <h1>
            Danh sách
            <small>Đơn hàng</small>
          </h1>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Đơn hàng</th>
                        <th>Tên nhân viên</th>
                        <th>Số điện thoại khách</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>  
                    <?php
                         require '../../inc/config.php';
                         $sql="SELECT s.ID_Donhang,n.Tennhanvien,s.Sdtkhach,s.Tongtien,s.Trangthaidonhang,s.Diachi,s.Tongtien
                         from donhang s
                         INNER JOIN nhanvienbanhang n on s.ID_Nhanvien = n.ID_Nhanvienbanhang ORDER BY s.ID_Donhang asc  ";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                      ?>       
                        <tr>           
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["ID_Donhang"] ?></a></td>
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["Tennhanvien"] ?></a></td>
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["Sdtkhach"] ?></a></td>
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["Diachi"] ?></a></td>
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["Trangthaidonhang"] ?></a></td>
                        <td ><a href ="xemchitietdonhang.php?id=<?php echo $row["ID_Donhang"]?>" style="color:black"><?php echo $row["Tongtien"] ?></a></td>
                        <td>
                          <a class="btn btn-primary" href="suadonhang.php?id=<?php echo $row["ID_Donhang"] ?>">
                            <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i>
                            </a> 
                           
                        </td>      
                        </tr>
                        <?php
                          }
                        }
                         ?>
                    </tbody>                   
                  </table>
                  <!-- <div  style="text-align:left">
                <a class="btn btn-primary "href="themdonhang.php">
                    Thêm Đơn hàng</a>
                </div>   -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php 
      include "footer.php";
     ?>
      <div class="control-sidebar-bg"></div>
    </div>

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script>
function myFunction() {
    alert("Xóa thành công");
}
</script>
  </body>
</html>
