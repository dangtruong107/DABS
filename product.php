

<?php
include "header.php";
include "navh.php";
include "navbar.php"
?>

<hr style=" border: 1.5px solid">
<div id="page-content" class="single-page">
    <?php
    require 'inc/config.php';
    //lay san pham theo id
    $id = $_GET["id"];
    $query = "SELECT s.ID_Sanpham,s.Tensanpham,s.Gia,s.Anh,s.Tacgia,s.Mota,n.Tendoitac as Tendoitac,s.ID_Doitac,a.Tentheloai,a.ID_Theloai
   from sanpham s 
   LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
   LEFT JOIN theloai as a on s.Theloai = a.ID_Theloai
   	WHERE  s.ID_Sanpham =" . $id;
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        $idsp = $_POST["idsp"];
        $sl;
        if (isset($_SESSION['cart'][$idsp])) {
            $sl = $_SESSION['cart'][$idsp] + 1;
        } else {
            $sl = 1;
        }
        $_SESSION['cart'][$idsp] = $sl;
        header:("location: cart.php");
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12" >
                <ul class="breadcrumb " style="background-color: #323741" >
                    <li><a style="color:#fff" href="index.php">Trang Chủ</a></li>
                    <li><a style="color:#fff" href="#">Sách</a></li>
                    <li><a style="color:#fff"  href="#"><?php echo $row["Tensanpham"] ?></a></li>
                </ul>
            </div>
        </div>
        <div class="row">

            <div id="main-content" class="col-md-10">
                <div class="product">
                    <div class="col-md-6">
                        <div class="image text-center">
                            <img src="images/<?php echo $row["Anh"] ?>" style="width:300px;height:390px" />

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="caption">
                            <div class="name ">
                                <h3 style="color:#000"><?php echo $row["Tensanpham"] ?></h3>
                            </div>
                            <div class="info">
                                <ul>
                                    <li >Tác giả: <b><?php echo $row["Tacgia"] ?></b></li>
                                    <li class="pt-3">Nhà xuất bản: <a href="category.php?ID_Doitac=<?php echo $row["ID_Doitac"] ?>"><?php echo $row["Tendoitac"] ?></a>
                                        
                                    </li>
                                    <li class="pt-3">Thể loại: <a href="categorytheloai.php?ID_Theloai=<?php echo $row["ID_Theloai"] ?>"><?php echo $row["Tentheloai"] ?></a>
                                    

                                    </li>
                                    <li style="padding-top:10px">Giá : <b style="color:red;"><?php echo $row["Gia"] ?> VND</b></li>
                            </div>
                           

                            <div class="well text-center">
                                <form name="form3" id="ff3" method="POST" action="">
                                    <input style="background-color:#3c4048 ;color:#fff" type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
                                    <input type="hidden" name="acction" value="them vao gio hang" />
                                    <input type="hidden" name="idsp" value="<?php echo $row["ID_Sanpham"] ?>" />
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product-desc">
                    <div class="tab-content">
                        <div id="description" class="tab-pane fade in active">
                            <h4 style="color:#3c4048">Nội Dung :</h4>

                            <div innerHTML>
                                <p><?php echo $row["Mota"] ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
              
                ?>

                
            </div>
        </div>
        
    </div>
</div>
</div>

<?php
include "footer.php"
?>
<!-- IMG-thumb -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event) {
            var x = $(event.target).text(); // active tab
            var y = $(event.relatedTarget).text(); // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
</script>
<style>
    #add-to-cart {
  animation-name: shake;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-fill-mode: both;
}

@keyframes shake {
  0% {transform: scale(1);}
  50% {transform: scale(1.2);}
  100% {transform: scale(1);}
}
</style>

</body>

</html>
<!-- transition button -->
<script>
// function shakeButton() {
//   var button = document.getElementById("add-to-cart");
//   button.style.transform = "rotate(-5deg)";
//   setTimeout(function() {
//     button.style.transform = "rotate(5deg)";
//   }, 100);
//   setTimeout(function() {
//     button.style.transform = "rotate(-5deg)";
//   }, 200);
//   setTimeout(function() {
//     button.style.transform = "rotate(5deg)";
//   }, 300);
//   setTimeout(function() {
//     button.style.transform = "rotate(0)";
//   }, 400);
// }

// setInterval(shakeButton, 1000);
</script>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
    // document.getElementById("add-to-cart").onclick = function(){
    // 	setTimeut(function(){
    // 		window.location.replace("http://localhost/MobileShop/cart.php");
    // 	}, 2000);
    // }
</script>