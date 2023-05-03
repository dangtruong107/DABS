<?php
$name = "";
$Diachi = "";
$dt = "";
$mk = "";
$kqdk = "";
$repass = "";

if (isset($_POST['dangky'])) {
	require 'inc/config.php';
	$name  = $_POST['fullname'];
	$Diachi = $_POST['Diachi'];
	$dt = $_POST['phone'];
	$mk = $_POST['password'];
	$repass = $_POST['repass'];
	if ($repass != $mk) {
		$kqdk = "Mật khẩu nhập lại không chính xác";
	} else {
		$sql = "INSERT INTO  khachhang (Diachi,Matkhau,Tenkhach,Sdt) 
        VALUES ('$Diachi','$mk' ,'$name','$dt') ";
		// echo  $mk;
		if (mysqli_query($conn, $sql)) {
			$name = "";
			$Diachi = "";
			$dt = "";
			$mk = "";
			$repass = "";
			$kqdk = "Đăng ký thành công";
		} else {
			$kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
		}
	}


	mysqli_close($conn);
}
?>