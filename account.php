<?php
ob_start();
session_start();
?>

<?php include "header.php" ?>


<?php
$tk = "";
$mk = "";
$kq = "";
if (isset($_POST['submit'])) {
	require 'inc/config.php';
	$tk = $_POST['txtus'];
	$mk = $_POST['txtem'];
	$sql = "SELECT * FROM khachhang  where Sdt = '$tk'  and Matkhau = '$mk'  ";
	$result = $conn->query($sql);
	// echo  $mk;
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$_SESSION['txtus'] = $tk;
			$_SESSION['Tenkhach'] = $row["Tenkhach"];
			$_SESSION['Sdt'] = $row["Sdt"];
			$_SESSION['Diachi'] = $row["Diachi"];
			header('Location: index.php');
			$row = $result->fetch_assoc();
		}
	} else {
		$kq = "Thông tin không đúng vui lòng kiềm tra lại";
	}
}
?>
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


<!-- Main css -->
<link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="main" style="background-color: #525e6c">


        <section class="signup">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-form" style="padding-top:60px">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form name="form1" id="ff1" method="POST" action="#">
                            <div class="form-group">
                                <label for="Sdt"><i class="zmdi zmdi-account material-icons-name"
                                        style="margin-left:10px"></i></label>
                                <input type="Sdt" class="form-control" placeholder="Số điện thoại" name="txtus" />
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock" style="margin-left:10px"></i></label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="txtem" />
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Nhớ mật
                                    khẩu</label>
                            </div>
                            <p class="form-group">
                                Bạn chưa có tài khoản?
                                <a style="text-decoration: none" href="accountdky.php">Đăng ký</a>
                            </p>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="login" class="form-submit" value="Đăng nhập"
                                    style="font-size:1rem">
                            </div>

                            <P style="color:red"><?php echo $kq; ?></p>
                        </form>
                    </div>
                    <div class="signup-image" style="margin:none">
                        <figure"><img  style="" src="images/signin.png" alt="sing up image" ></figure>
                        <a class="signup-image-link" href="index.php" style="font-size:2rem; text-decoration:none"><span
                                style="color: #323741;">We</span><span style="color: #f38556;">Book</span></a>
                    </div>
                </div>
            </div>
        </section>


    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<?php ob_end_flush(); ?>