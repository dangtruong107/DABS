<?php 

	include "login.php";
	include "header.php";
    include "navh.php";
	include "navbar.php";
 ?>
    <hr style=" border: 1.5px solid">
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb"  style="background-color: #323741">
					<li><a href="index.php" style="color:#fff">Trang chủ</a></li>
					<li><a style="color:#fff">Kết quả tìm kiếm</a></li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php
							   require 'inc/config.php';
							   //lay san pham theo id
							   $tentimkiem = $_GET["txttimkiem"];
							   $result = mysqli_query($conn, "select count(ID_Sanpham) as total from sanpham where Tensanpham like '%$tentimkiem%' " );
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];
							   if($row['total'] == 0)
							   {
								 header('Location:search-unavailable.php');
							   }
							   $offset =1;
							   // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
							   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
							   $limit = 6;
							   // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
							   // tổng số trang
							   $total_page = ceil($total_records / $limit);
								
							   // Giới hạn current_page trong khoảng 1 đến total_page
							   if ($current_page > $total_page){
								   $current_page = $total_page;
							   }
							   else if ($current_page < 1){
								   $current_page = 1;
							   }
								
							   // Tìm Start
							   $start = ($current_page - 1) * $limit;
								
							   // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
							   // Có limit và start rồi thì truy vấn CSDL lấy danh Sách tin tức
							   $result = mysqli_query($conn, "SELECT * FROM sanpham where Tensanpham like '%$tentimkiem%'  LIMIT $start, $limit " );
	// output data of each row
	                           while ($row = mysqli_fetch_assoc($result)){

?>

								<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product pt-3" a style="text-align:center">
								<div class="image"><a href="product.php?id=<?php echo $row["ID_Sanpham"]?>"><img src="images/<?php echo $row["Anh"]?>" style="width:200px;height:290px" /></a></div>
								<div class="caption">
									<div class="name"><h3><a style="color:#000" href="product.php"><?php echo $row["Tensanpham"]?></a></h3></div>
									<div class="price"><?php echo $row["Gia"] ?> VND</div>
								</div>
								<style>
								.product {
									transition: transform 0.5s;
								}

								.product:hover {
									transform: scale(1.1);
									color: red;
								}
								
							</style>
							</div>
								</div>
								<?php
		}
					?>
							</div>
						</div>
	
					</div>
		
					<div class="text-center" style="margin-top:30px">
						<ul class="pagination">
						<?php 
						// PHẦN HIỂN THỊ PHÂN TRANG
			// BƯỚC 7: HIỂN THỊ PHÂN TRANG
			 
			// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){

					   ?>
					   <li class="active"><a href="#"><?php echo $i ?></a></li>					   
						  <?php 
				}

			?>
			<?php
			if($i != $current_page){
			 ?>	
			 	  <li><?php echo '<a href="search.php?txttimkiem='.$tentimkiem.'&page='.$i.'">'.$i.'</a> '; ?></li>
			 <?php
			}
			  ?>	
						  <?php 
			}
						  ?>
						</ul>
					</div>
		
				</div>
				<?php 
	
	include "sidebar.php"
	?>
			</div>
		</div>
	</div>	
	<?php 
	include "footer.php"
	?>
    </body>
</html>

