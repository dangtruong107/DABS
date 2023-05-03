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
            <small>Nhân viên</small>
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
                        <th>ID Nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>  
                    <?php
                         require '../../inc/config.php';
                         $sql="SELECT ID_Nhanvienbanhang,Tennhanvien,Sdt from nhanvienbanhang Order by ID_Nhanvienbanhang";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                      ?>       
                        <tr>           
                        <td ><a href ="xemchitietnhanvien.php?ID_Nhanvienbanhang=<?php echo $row["ID_Nhanvienbanhang"]?>" style="color:black"><?php echo $row["ID_Nhanvienbanhang"] ?></a></td>
                        <td ><a href ="xemchitietnhanvien.php?ID_Nhanvienbanhang=<?php echo $row["ID_Nhanvienbanhang"]?>" style="color:black"><?php echo $row["Tennhanvien"] ?></a></td>
                        <td ><a href ="xemchitietnhanvien.php?ID_Nhanvienbanhang=<?php echo $row["ID_Nhanvienbanhang"]?>" style="color:black"><?php echo $row["Sdt"] ?></a></td>
                        <td><a class="btn btn-primary" href="suanhanvien.php?ID_Nhanvienbanhang=<?php echo $row["ID_Nhanvienbanhang"] ?>">
                            <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i>
                            </a> 
                            <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="xoanhanvien.php?ID_Nhanvienbanhang=<?php  echo $row["ID_Nhanvienbanhang"]  ?>" onclick="myFunction()">
                            <i class="fa fa-trash-o fa-lg" title="Xóa"></i>
                            </a>
                        </td>      
                        </tr>
                        <?php
                          }
                        }
                         ?>
                    </tbody>                   
                  </table>
                  <div  style="text-align:left">
                <a class="btn btn-primary "href="themnhanvien.php">
                    Thêm Nhân viên</a>
                </div>  
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
