<?php
ob_start();
?>

<?php
 require "login.php";
      if(!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
       {
           header("Location:account.php");  
       }

?>
<?php 
	include "header.php";
	include "navh.php";
	include "navbar.php";
	?>


<?php 
	if(is_countable($_SESSION['cart']) == 0)
	{
		header('Location: empty-cart.php');
	}
	?>

<hr style=" border: 1.5px solid">
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">

            <div class="cart">
                <p><?php
			$ok=1;
			 if(isset($_SESSION['cart']))
			 {
				 foreach($_SESSION['cart'] as $key => $value)
				 {
					 if(isset($key))
					 {
						$ok=2;
					 }
				 }
			 }
			
			 if($ok == 2)
			 {
				echo "<p style='font-size: 2rem'> Hiện có ".count($_SESSION['cart']). " loại sản phẩm trong giỏ hàng của bạn </p>";
			 }
			else
			{
				echo   "<p>Không có sản phẩm nào trong giỏ hàng.</p>";
			}
			
			$sl = count($_SESSION['cart']);
			?>
                </p>
            </div>
            <?php

			require "inc/config.php";

			if(isset($_SESSION['cart']))
			{
				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
				// echo $item;
				$str= implode(",",$item);
                $query = "SELECT s.ID_Sanpham,s.Tensanpham,s.Gia,s.Anh,s.Tacgia,s.Mota,n.Tendoitac as Tendoitac,s.ID_Doitac,a.Tentheloai
                from sanpham s 
                LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
                LEFT JOIN theloai as a on s.Theloai = a.ID_Theloai
				 WHERE  s.ID_Sanpham  in ($str)";
				$result = $conn->query($query);
				$total=0;
				foreach($result as $s)
				{
			?>

            <div class="row">
                <form name="form5" id="ff5" method="POST" action="remove-cart.php">
                    <!-- <div class="product well"> -->
                    <div class="col-md-3">
                        <div class="image">
                            <img src="images/<?php  echo $s["Anh"]?>"
                                style="width:250px;height:330px; margin-top:20px; margin-bottom:20px" />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="caption">
                            <div class="name">
                                <h3><a style="color: #000;"
                                        href="product.php?id=<?php  echo $s["ID_Sanpham"]?>"><?php  echo $s["Tensanpham"]?></a>
                                </h3>
                            </div>
                            <div class="info">
                                <ul>
                                    <li>Nhà xuất bản: <?php  echo $s["Tendoitac"]?></li>
                                </ul>
                                <ul>
                                    <li>Thể loại: <?php  echo $s["Tentheloai"]?></li>
                                </ul>
                            </div>
                            <div class="price" style="margin:10px 20px"><b style="color:red;">Giá : <?php  echo $s["Gia"]?> VND</b> </div>

                            <label>Số lượng: </label>
                            <input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99"
                                type="number" name="qty[<?php echo $s["ID_Sanpham"] ?>]"
                                value="<?php echo $_SESSION['cart'][$s["ID_Sanpham"]]?>">
                            <!-- <div>
								<input type="submit" name="update" style="margin-top:31px;background-color:#3c4048 ;color:#fff"  value="Cập nhật" class="btn btn-2" />
							</div> -->
                            <div>
                                <input type="submit" name="update"
                                    style="margin-top:31px;background-color:#3c4048 ;color:#fff" value="Cập nhật"
                                    class="btn btn-2" onclick="updateSuccess()" />
                            </div>
                            <div id="update-message"> Cập nhật thành công 
								<img style="width:30px" src="images/icondone.png"  alt="">
						</div>
                            <style>
                            #update-message {
                                position: fixed;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                padding: 20px 50px;
                                background-color: #3c4048;
                                color: #fff;
                                border-radius: 5px;
                                opacity: 0;
                                animation-name: fadeOut;
                                animation-duration: 2s;
                            }

                            @keyframes fadeOut {
                                0% {
                                    opacity: 1;
                                }

                                100% {
                                    opacity: 0;
                                }
                            }
                            </style>
                           

                            <hr>
                            <input type="submit" name="remove" value="Xóa" class="btn btn-default pull-right"
							onclick="updateSuccess()" style="margin-bottom:5px;background-color:#3c4048 ;color:#fff" >
                            <input type="hidden" name="idsprm" value="<?php echo $s["ID_Sanpham"] ?>" />


                            <label style="color:red">Thành tiền: <?php ;
							    echo  $_SESSION['cart'][$s["ID_Sanpham"]] * $s["Gia"]?>.000 </label>


                        </div>
                    </div>

                    <div class="clear"></div>
                    <!-- </div>	 -->
                </form>



                <?php 
				              $total +=$_SESSION['cart'][$s["ID_Sanpham"]] * $s["Gia"]?>


            </div>
            <?php 
				}
			}
			?>

            <div class="row" style="margin-bottom:50px">
                <a href="rm-cart.php" class="btn btn-2"
                    style="margin-bottom:31px;background-color:#3c4048 ;color:#fff">Xóa tất cả</a>
                <div class="col-md-4 col-md-offset-8 ">
                    <center><a href="index.php" class="btn btn-1"
                            style="margin-left:-76px;background-color:#3c4048 ;color:#fff">Chọn thêm sách khác</a>
                    </center>
                </div>
                <div class="row">
                    <div class="pricedetails">
                        <div class="col-md-4 col-md-offset-8">
                            <table style="margin-right:31px">
                                <h5>Chi tiết</h5>
                                <tr>
                                    <td>Loại sách: </td>
                                    <td><?php echo $sl ?></td>
                                </tr>
                                <tr style="border-top: 1px solid #333">
                                    <td>
                                        <h5>Thành tiền : </h5>
                                    </td>
                                    <td><?php echo $total ?>.000</td>
                                </tr>
                            </table>
                            <center><a href="dathang.php" class="btn btn-1"
                                    style="background-color:#3c4048 ;color:#fff">Đặt hàng</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
	include "footer.php"
	?>
    </body>

    </html> <script>
                            function updateSuccess() {
                                var updateMessage = document.getElementById("update-message");
                            }
                            </script>
    <?php ob_end_flush(); ?>