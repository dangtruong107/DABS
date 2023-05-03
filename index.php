<?php
include 'header.php';
include 'navh.php';
include 'navbar.php';
include 'inc/config.php';
?>

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style=" max-width: 90%;margin-left:10%;margin-right:10%">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/pic5.png" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="images/pic4.png" class="d-block w-100" alt="...">
		</div>
		<div class="carousel-item">
			<img src="images/pic6.png" class="d-block w-100" alt="...">
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-18">

			<div class="heading animated-heading">
				<h2 style="text-align:center;padding-bottom:50px;font-size:20px">SẢN PHẨM HIỆN CÓ</h2>
			</div>
			<hr>

			<div class="products">
				<?php
				require 'inc/config.php';
				$result = mysqli_query($conn, 'select count(ID_Sanpham) as total from sanpham');
				$row = mysqli_fetch_assoc($result);
				$total_records = $row['total'];
				if ($row['total'] == 0) {
					header('Location: khongcosanpham.php');
				}
				$offset = 1;
				// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 8;
				// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
				// tổng số trang
				$total_page = ceil($total_records / $limit);

				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page) {
					$current_page = $total_page;
				} else if ($current_page < 1) {
					$current_page = 1;
				}

				// Tìm Start
				$start = ($current_page - 1) * $limit;

				$query = "SELECT * from sanpham ORDER BY ID_Sanpham DESC LIMIT $start, $limit;";
				$rs = $conn->query($query);
				if ($rs->num_rows > 0) {
					// output data of each row
					while ($row = $rs->fetch_assoc()) {

				?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pb-5 pt-3">
							<div class="product">
								<div class="image" style="text-align:center"><a href="product.php?id=<?php echo $row["ID_Sanpham"] ?>"><img src="images/<?php echo $row["Anh"] ?>" style="width:200px;height:260px" /></a></div>
								<div class="caption">
									<div class="name">
										<h3 style="text-align:center"><a style="color: #000;font-size:18px" href="product.php?id=<?php echo $row["ID_Sanpham"] ?>"><?php echo $row["Tensanpham"] ?></a></h3>
									</div>
									<div class="price" style="text-align:center"><?php echo $row["Gia"] ?> VNĐ</div>
								</div>
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
				<?php
					}
				}
				?>
			</div>
			<div class=" text-center">
				<ul class="pagination" style="margin-top:100px">
					<?php
					// PHẦN HIỂN THỊ PHÂN TRANG
					// BƯỚC 7: HIỂN THỊ PHÂN TRANG

					// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
					for ($i = 1; $i <= $total_page; $i++) {
						if ($i == $current_page) {

					?>
							<li class="active"><a href="#"><?php echo $i  ?></a></li>
						<?php
						}

						?>
						<?php
						if ($i != $current_page) {
						?>
							<li><?php echo '<a href="index.php?page=' . $i . '">' . $i . '</a> '; ?></li>
						<?php
						}
						?>
					<?php
					}
					?>
				</ul>
			</div>


		</div>
	</div>

	<?php
	?>


</div>

</div>
</div>
</div>
<?php
include "footer.php"
?>
</body>

</html>