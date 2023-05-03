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
            <small>Thể loại</small>
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
                        <th>ID</th>
                        <th>Tên thể loại</th>
                      </tr>
                    </thead>
                    <tbody>  
                    <?php
                         require '../../inc/config.php';
                         $sql="SELECT * from theloai";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                      ?>       
                        <tr>           
                        <td ><?php echo $row["ID_Theloai"] ?></a></td>
                        <td ><?php echo $row["Tentheloai"] ?></a></td>
                        <td ></td>
                        <td><a class="btn btn-primary" href="suadanhmuc.php?ID_Theloai=<?php echo $row["ID_Theloai"] ?>">
                            <i class="fa fa-edit fa-lg" title="Chỉnh sửa"></i>
                            </a> 
                            <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="xoadanhmuc.php?ID_Theloai=<?php  echo $row["ID_Theloai"]  ?>" onclick="myFunction()">
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
                <a class="btn btn-primary "href="themdanhmuc.php">
                    Thêm Thể loại</a>
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
