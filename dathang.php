<?php
ob_start();

?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) // If session == null thi tra ve trang login
{
    header("Location:account.php");
}

?>

<?php
include "header.php";
include "navh.php";
include "navbar.php";
?>

<hr style=" border: 1.5px solid">
<form name="form6" id="ff6" method="POST" action="<?php include 'luudonhang.php' ?>">
    <div id="page-content" class="single-page">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb" style="background-color: #323741">
                        <li><a style="color:#fff" href="index.php">Trang Chủ</a></li>
                        <li><a style="text-align:center; color:#fff">Đặt Hàng</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="col-md-8" style="margin-left: 130px;">
                                <label>Tên : <?php echo  $_SESSION['Tenkhach'] ?></label>
                                <br>
                                <label>Số điện thoại: <?php echo  $_SESSION['Sdt'] ?></label>
                                <br>
                                <label>Địa Chỉ:<?php echo    $_SESSION['Diachi'] ?></label>
                                <br>
                                <label><input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng   :" name="diachi" required></label>
                                <br />

                                <label><input type="date" class="form-control" placeholder="Ngày mua  :" name="Ngaymua" id="datechoose" required></label>


                            </div>

                        </div>

                    </div>

                    </select>
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin đơn hàng</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sách: </th>
                                                <th>Số lượng: </th>
                                                <th>Giá: </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key  => $value) {
                                                    $item[] = $key;
                                                }
                                                // echo $item;
                                                $str = implode(",", $item);
                                                $query = "SELECT s.ID_Sanpham,s.Tensanpham,s.Gia,s.Anh,s.Tacgia,s.Mota,n.Tendoitac as Tendoitac,s.ID_Doitac
				from sanpham s 
				LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
				 WHERE  s.ID_Sanpham  in ($str)";
                                                $result = $conn->query($query);

                                                $total = 0;
                                                foreach ($result as $s) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $s["Tensanpham"] ?></td>
                                                        <td><?php echo $_SESSION['cart'][$s["ID_Sanpham"]] ?></td>




                                                        <td><?php echo $s["Gia"] ?> VNĐ</td>


                                                    </tr>



                                                    <?php
                                                    $total += $_SESSION['cart'][$s["ID_Sanpham"]] * $s["Gia"]  ?>


                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Thành tiền:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th name="result" style="color:red">
                                                    <strong style="color:red" id="result" name="total" >
                                                        <?php echo  $total ?> .000VNĐ
                                                    </strong>
                                                </th>
                                                <input type="hidden" name="total" id="total" value=""/>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading"> Loại Sách (<?php echo count($_SESSION['cart']) ?>)</div>
                    <div class="panel-body">
                        <?php

                        require "inc/config.php";

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key  => $value) {
                                $item[] = $key;
                            }
                            // echo $item;
                            $str = implode(",", $item);
                            $query = "SELECT s.ID_Sanpham,s.Tensanpham,s.Gia,s.Anh,s.Tacgia,s.Mota,n.Tendoitac as Tendoitac,s.ID_Doitac,a.Tentheloai
                from sanpham s 
                LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
                LEFT JOIN theloai as a on s.Theloai = a.ID_Theloai

				 WHERE  s.ID_Sanpham  in ($str)";
                            $result = $conn->query($query);
                            $total = 0;
                            foreach ($result as $s) {
                        ?>
                                <div class="product well">
                                    <div class="col-md-3">
                                        <div class="image" style=" float: right">
                                            <img src="images/<?php echo $s["Anh"] ?>" style="width:250px;height:330px" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a style="color:#000" href="product.php?id=<?php echo $s["ID_Sanpham"] ?>"><?php echo $s["Tensanpham"] ?></a>
                                                </h3>
                                            </div>
                                            <div class="info">
                                                <ul>
                                                    <li>Đối tác : <?php echo $s["Tendoitac"] ?></li>
                                                    <li>Thể loại : <?php  echo $s["Tentheloai"]?></li>

                                                </ul>
                                            </div>



                                            <div class="price">Giá : <?php echo $s["Gia"] ?>.000 VNĐ</div>


                                            <!-- <label>Số lượng: </label>  -->
                                            <input class="form-inline quantity" type="hidden" name="qty[<?php echo $s["ID_Sanpham"] ?>]" value="<?php echo $_SESSION['cart'][$s["ID_Sanpham"]] ?>">
                                            <hr>

                                            <lable>Số lượng :<?php echo $_SESSION['cart'][$s["ID_Sanpham"]] ?></lable>
                                            <input type="hidden" name="idsprm" value="<?php echo $s["ID_Sanpham"] ?>" />


                                            <input type="hidden" name="dongia" value="<?php echo $s["Gia"] ?>" />


                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <?php
                                $total += $_SESSION['cart'][$s["ID_Sanpham"]] * $s["Gia"] ?>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
            <input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" style="margin-left: 50%; margin-bottom: 50px ;background-color:#3c4048 ;color:#fff" />
        </div>
    </div>
</form>
<?php
include "footer.php"
?>
</body>

</html>
<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>


<?php ob_end_flush(); ?>