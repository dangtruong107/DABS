<?php
ob_start();
session_start();
?>

<?php include "header.php" ?>

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
    $sql_select = "SELECT Sdt FROM khachhang WHERE Sdt = '$dt'";
		$result = mysqli_query($conn, $sql_select);
		if (mysqli_num_rows($result) > 0) {
			$kqdk = "Số điện thoại bị trùng không thể đăng ký";
		}
	else {
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
        header('Location: account.php');
		$row = $result->fetch_assoc();
	}
   
	mysqli_close($conn);
}
?>
<link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="main" style="background-color: #525e6c">
        <!-- Đăng ký -->
        <section class="sign-up">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-image">
                        <figure><img src="images/signup.png" alt="sing up image" style="width:500px;"></figure>
                        <a class="signup-image-link" href="index.php" style="font-size:2rem; text-decoration:none"><span
                                style="color: #323741;">We</span><span style="color: #f38556;">Book</span></a>
                    </div>

                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <form name="form2" id="ff2" method="POST" action="#">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"
                                        style="margin-left:10px"></i></label>
                                <input type="text" class="form-control" placeholder="Họ Tên" name="fullname"
                                    id="firstname" value="<?php echo $name; ?>" required>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="Diachi"><i class="zmdi zmdi-email" style="margin-left:10px"></i></label>
                                <input type="Diachi" class="form-control" placeholder="Địa Chỉ" name="Diachi"
                                    id="Diachi" value="<?php echo $Diachi; ?>" required>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="mobile"><i class="zmdi zmdi-mobile" style="margin-left:10px"></i></label>
                                <input type="number" class="form-control" placeholder="Số điện thoại" name="phone"
                                    id="phone" value="<?php echo $dt; ?>" required>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock" style="margin-left:10px"></i></label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                    id="password" value="<?php echo $mk; ?>" required>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"
                                        style="margin-left:10px"></i></label>
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                                    name="repass" id="repass" value="<?php echo $repass; ?>" required>
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý
                                    với <a href="#" class="term-service">Điều khoản sử dụng</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="dangky" class="form-submit" value="Đăng ký"
                                    style="font-size:1rem">
                            </div>
                            <P style="color:red"><?php echo $kqdk; ?></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="validator.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#ff2',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#firstname', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.isRequired('#Diachi'),
                Validator.isRequired('#phone'),
                Validator.minLength('#password', 6),
                Validator.isRequired('#repass'),
                Validator.isConfirmed('#repass', function() {
                    return document.querySelector('#ff2 #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
            // onSubmit: function(data) {
               
            // }
        });
    });
    </script>
</body>
<?php ob_end_flush(); ?>