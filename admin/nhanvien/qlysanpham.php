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
            <small>Sản phẩm</small>
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
                      <th>ID Sản phẩm</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Thể loại</th>
                        <th>Nhà xuất bản</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>  
                    <?php
                         require '../../inc/config.php';
                         $sql="SELECT s.ID_Sanpham,s.Tensanpham,s.Anh,s.Gia,n.Tendoitac, a.Tentheloai
                         from sanpham as s
                         LEFT JOIN doitac as n on n.ID_Doitac = s.ID_Doitac
                         LEFT JOIN theloai as a on s.Theloai = a.ID_Theloai ORDER BY s.ID_Sanpham asc  ";
                         $result = $conn->query($sql); 
                        
                         if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                      ?>       
                        <tr>
                        <td ><a href ="xemchitietsanpham.php?id=<?php echo $row["ID_Sanpham"]?>" style="color:black"><?php echo $row["ID_Sanpham"] ?></a></td>           
                        <td ><a href ="xemchitietsanpham.php?id=<?php echo $row["ID_Sanpham"]?>" style="color:black"><?php echo $row["Tensanpham"] ?></a></td>
                        <td><?php echo $row["Gia"] ?></td>
                        <td><img src="../../images/<?php echo $row["Anh"]?>" style="width:150px;height:100px"></td>
                        <td><?php echo $row["Tentheloai"] ?></td>
                        <td><?php echo $row["Tendoitac"] ?></td>
                        <td><a class="btn btn-primary" href="suasanpham.php?ID_Sanpham=<?php echo $row["ID_Sanpham"] ?>">
                            <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i>
                            </a> 
                            <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="xoasanpham.php?ID_Sanpham=<?php  echo $row["ID_Sanpham"]  ?>" onclick="myFunction()">
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
                <a class="btn btn-primary "href="themsanpham.php">
                    Thêm Sản phẩm</a>
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
