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
        <section class="content-header">
          <h1>
            Thêm
            <small>Thể loại</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <form class="form-horizontal" method="POST" action="<?php include 'xulyluudanhmuc.php' ?>">
                  <div class="box-body">
                  
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Tên thể loại</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                  <a href="qlydanhmuc.php"><button type="button" name="cancel" class="btn btn-default">Hủy</button></a>
                    <button type="submit" name="create" class="btn btn-info pull-right">Lưu lại</button>
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
  
      <div class="control-sidebar-bg"></div>
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

    <script src="../../dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
