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
   $query="SELECT s.ID_Sanpham,s.ID_Doitac,n.Tendoitac,s.Tensanpham,a.Tentheloai,s.Anh,s.Tacgia,s.Gia,s.Mota
   from sanpham s 
   LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
   LEFT JOIN theloai a on a.ID_Theloai = s.Theloai
	WHERE  s.ID_Sanpham =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Xem
            <small>Thông tin Sách</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12" >
              <div class="box box-info">
                <form class="form-horizontal" >
                  <div class="box-body" >
                  <div class="form-group">
                      <label  class="col-sm-2">ID Sách:</label>
                      <div class="col-sm-5">
                      <p><?php echo $row["ID_Sanpham"] ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2">Tên sách:</label>
                      <div class="col-sm-5">
                      <p><?php echo $row["Tensanpham"] ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2 ">Thể loại:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["Tentheloai"] ?></p>
                      </div> 
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2">Hình ảnh</label>  
                      <div class="col-sm-2">
                      <p><img src="../../images/<?php echo $row["Anh"]?>" style="width:300px;height:400px"></p>
                      </div>        
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2 ">Nhà xuất bản:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["Tendoitac"] ?></p>
                      </div> 
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2 ">Tác giả:</label>
                    <div class="col-sm-5">
                      <p><?php echo $row["Tacgia"] ?></p>
                      </div> 
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2 ">Giá:</label>  
                    <div class="col-sm-5">
                      <p><?php echo $row["Gia"] ?> VNĐ</p>
                      </div>        
                    </div>
                  <div class="form-group">
                    <label  class="col-sm-2 ">Mô tả: </label>
                    <div class="col-sm-5">
                      <p><?php echo $row["Mota"] ?></p>
                      </div> 
                    
                  </div>
                  </div>
                  <div class="box-footer">
                  <a href="qlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Quay lại</button></a>
                  </div>
                </form>
              </div>
            </div>
          </div> 
        </section>
      </div>
      <?php 
      include "footer.php";
     ?>
  
      <div class="control-sidebar-bg">
      </div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
    <script src="dist/js/demo.js"></script>
  </body>
</html>


