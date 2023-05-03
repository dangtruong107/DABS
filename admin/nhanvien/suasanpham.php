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
   //lay san pham theo id
   $id = $_GET["ID_Sanpham"];
   $query="SELECT *
   from sanpham s 
   LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
   LEFT JOIN theloai a on a.ID_Theloai = s.Theloai
	WHERE  s.ID_Sanpham =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
        <section class="content-header">
          <h1>
            Sửa
            <small>Thông tin Sách</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">

            <div class="col-md-12">
              <div class="box box-info">
                <form class="form-horizontal"  method="POST" action="<?php include 'xulysuasanpham.php'?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Mã sách</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="id" value="<?php echo $row["ID_Sanpham"] ?>" required disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tên sách</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?php echo $row["Tensanpham"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Thể loại</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="theloai">
                      <option selected="selected" value="<?php echo $row["Theloai"] ?>"><?php echo $row["Tentheloai"] ?></option>
                      <?php
                         require '../../inc/config.php';
                         $sqls="SELECT ID_Theloai,Tentheloai from theloai " ;
                         $results = $conn->query($sqls); 
                         if ($results->num_rows > 0) {

                          while($rows = $results->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $rows["ID_Theloai"] ?>"><?php echo $rows["Tentheloai"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["Anh"] ?>">
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ảnh hiện tại:   </label>
                        <div class="col-sm-10">
                      <img src="../../images/<?php echo $row["Anh"]?>" style="width:300px;height:400px">
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="anh" value="<?php echo $row["Anh"] ?>">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $row["ID_Sanpham"] ?>">
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tác giả</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tacgia" value="<?php echo $row["Tacgia"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nhà xuất bản</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="doitac">
                      <option selected="selected" value="<?php echo $row["ID_Doitac"] ?>"><?php echo $row["Tendoitac"] ?></option>
                      <?php
                         require '../../inc/config.php';
                         $sqls="SELECT ID_Doitac,Tendoitac from doitac where ID_Doitac !=".$row["ID_Doitac"] ;
                         $results = $conn->query($sqls); 
                         if ($results->num_rows > 0) {

                          while($rows = $results->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $rows["ID_Doitac"] ?>"><?php echo $rows["Tendoitac"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control"  name="gia" required value="<?php echo $row["Gia"] ?>">
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                    <textarea id="editor1" name="editor1" name="editor1"  rows="10" cols="80">
                    <?php echo $row["Mota"] ?>
                    </textarea>
                    </div>
                  </div>
               
                  <div class="box-footer">
                  <a href="qlysanpham.php"><button type="button" name="cancel" class="btn btn-default">Hủy</button></a>
                    <button type="submit" name="Edit" class="btn btn-info pull-right">Lưu lại</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>  
        </section>
           
      <?php 
      include "footer.php";
     ?>

      </div>
  
      <div class="control-sidebar-bg"></div>
    </div>

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

        CKEDITOR.replace('editor1');

        $(".textarea").wysihtml5();
      });
    </script>

    <script src="dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>

