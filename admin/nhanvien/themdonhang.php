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
<style>

.buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:3.2rem;
    width:6rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
    font-size:2.2rem;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:3.2rem;
    text-align:center;
    font-size:2.1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}

</style>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Thêm
            <small>Đơn hàng</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <form class="form-horizontal" method="POST" action="<?php include 'xulyluudonhang.php' ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Nhân viên</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="manhanvien">
                    <option selected="selected" value="5">Chọn Nhân viên</option>
                     <?php
                         require '../../inc/config.php';
                         $sql="SELECT ID_Nhanvienbanhang,Tennhanvien from nhanvienbanhang";
                         $result = $conn->query($sql); 
                         if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row["ID_Nhanvienbanhang"] ?>"><?php echo $row["Tennhanvien"] ?></option>
                      <?php 
                          }
                        }
                      ?>
                    </select>
                    </div>
                    
                    </div>
                    <div class="form-group">
                    <label for="inputEmail3"  class="col-sm-2 control-label">Số điện thoại khách hàng</label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại khách" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Ngày mua</label>
                      <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" placeholder="Ngày đặt hàng" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Địa chỉ</label>
                      <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Sách</label>
                      <div class="col-sm-4">
                      <select class="form-control select2" style="width: 100%;" name="masanpham">
                      <option selected="selected" value="5">Chọn sản phẩm</option>
                      <?php
                          require '../../inc/config.php';
                          $sql="SELECT ID_Sanpham,Tensanpham from sanpham";
                          $result = $conn->query($sql); 
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["ID_Sanpham"] ?>"><?php echo $row["Tensanpham"] ?></option>
                        <?php 
                            }
                          }
                        ?>
                      </select>
                      </div>
                      <div class="col-sm-5">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Số lượng</label>
                        <div class="buttons_added">
                          <input class="minus is-form" type="button" value="-">
                          <input aria-label="quantity" class="input-qty" max="1000" min="1" name="" type="number" value="0">
                          <input class="plus is-form" type="button" value="+">
                        </div>
                      </div>
                      <button id="addRows" class="btn btn-primary" type="button">+</button>
                    </div>

                    <div id="maintable"></div>

                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">Tổng tiền</label>
                      <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" placeholder="Tổng tiền" required>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                  <a href="qlydonhang.php"><button type="button" name="cancel" class="btn btn-default">Hủy</button></a>
                    <button type="submit" name="create" class="btn btn-info pull-right">Lưu lại</button>
                  </div>
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

      let listPlus = document.querySelector('.plus');
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');

        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      $("#addRows").click(function () {
        $("#maintable").append(`
        <div class="form-group donhang_added">
          <label for="inputEmail3"  class="col-sm-2 control-label">Sách</label>
          <div class="col-sm-4">
          <select class="form-control select2" style="width: 100%;" name="masanpham">
          <option selected="selected" value="5">Chọn sản phẩm</option>
          <?php
              require '../../inc/config.php';
              $sql="SELECT ID_Sanpham,Tensanpham from sanpham";
              $result = $conn->query($sql); 
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row["ID_Sanpham"] ?>"><?php echo $row["Tensanpham"] ?></option>
            <?php 
                }
              }
            ?>
          </select>
          </div>
          <div class="col-sm-5">
          <label for="inputEmail3"  class="col-sm-2 control-label">Số lượng</label>
            <div class="buttons_added">
              <input class="minus is-form" type="button" value="-">
              <input aria-label="quantity" class="input-qty" max="1000" min="1" name="" type="number" value="0">
              <input class="plus is-form" type="button" value="+">
            </div>
          </div>
        </div>
        `);

        listPlus = document.querySelector('.plus');
        listPlus.forEach((p, idx) => {
          if (idx >= listPlus.length - 1) {
            p.addEventListener('click', e => console.log('PLUS'))
          }
        })
      });

      listPlus.forEach(p => p.addEventListener('click', e => console.log('PLUS')))
      
    </script>

    <script src="../../dist/js/demo.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
