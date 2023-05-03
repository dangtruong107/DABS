<?php 
require "inc/config.php";
if(isset($_POST['Dat']))
			{
             if(isset($_SESSION['cart']))
            {

				foreach($_SESSION['cart'] as $key  => $value)
				{
					$item[]=$key;
				}
                $str= implode(",",$item);
				$query = "SELECT s.ID_Sanpham,s.Tensanpham,s.Gia,s.Anh,s.Tacgia,s.Mota,n.Tendoitac as Tendoitac,s.ID_Doitac
				from sanpham s 
				LEFT JOIN doitac n on n.ID_Doitac = s.ID_Doitac
                WHERE  s.ID_Sanpham  in ($str)";
				$result = $conn->query($query);
                $total= $_POST['total'];
                $Ngaymua = $_POST['Ngaymua'];
                $diachi = $_POST['diachi'];
                $dienthoai =  $_SESSION['Sdt'];
                $trangthai='Chờ xác nhận';
               

                $sql1="INSERT INTO donhang (Sdtkhach,Ngaymua,Diachi,Tongtien,Trangthaidonhang)
                VALUES ('$dienthoai','$Ngaymua','$diachi','$total','$trangthai');";
               if ($conn->query($sql1) === TRUE) 
                {
                    foreach($result as $s)
                    {
                       $masp= $s["ID_Sanpham"];
                       $dongia= $s["Gia"];
                       $sl= $_SESSION['cart'][$s["ID_Sanpham"]];
                       $thanhtien =  $sl* $dongia;
                      //tao mang hd de luu số hd cua sql1
                       $hd[] =  mysqli_insert_id($conn);
                       //lua mang
                       $str= implode(",",$hd);
                       $sql2="INSERT INTO  chitietdonhang (ID_Donhang,ID_Sanpham,Soluong,Dongia,Thanhtien) 
                       VALUES ('$str','$masp','$sl','$dongia','$thanhtien');";         
if ($conn->query($sql2) === TRUE) {
    header('Location: xacnhandonhang.php');
    // destroy the session 
    session_destroy(); 
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
                }
                }
               }
     }

			?>

