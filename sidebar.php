<div id="sidebar" class="col-md-4">
	<div class="widget wid-categories">
		<div class="heading">
			<h3>Nhà xuất bản</h3>
		</div>
		<div class="content">
			<ul>
				<?php
				require 'inc/config.php';
				//lay san pham theo id
				$layidrandom = "SELECT ID_Doitac,Tendoitac from doitac";
				$kq = $conn->query($layidrandom);
				if ($kq->num_rows > 0) {
					// output data of each row
					while ($d = $kq->fetch_assoc()) {

				?>
						<li><a href="category.php?ID_Doitac=<?php echo $d["ID_Doitac"] ?>"><?php echo $d["Tendoitac"] ?></a></li>
				<?php
					}
				}
				?>
			</ul>
		</div>
		<div class="heading">
			<h3>Thể Loại</h3>
		</div>
		<div class="content">
			<ul>
				<?php
				require 'inc/config.php';
				//lay san pham theo id
				$layidtheloai = "SELECT ID_Theloai,Tentheloai from theloai";
				$kq = $conn->query($layidtheloai);
				if ($kq->num_rows > 0) {
					// output data of each row
					while ($d = $kq->fetch_assoc()) {

				?>
						<li><a href="categorytheloai.php?ID_Theloai=<?php echo $d["ID_Theloai"] ?>"><?php echo $d["Tentheloai"] ?></a></li>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<hr style=" border: 1px solid black">
	
</div>