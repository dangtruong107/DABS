<?php
if(isset($_POST['create']))
{
    require '../../inc/config.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $sql="INSERT INTO  nhanvienbanhang (ID_Nhanvienbanhang, Tennhanvien, Sdt, Diachi, Tendangnhap, Matkhau) 
    VALUES ('$id', '$name', '$phone', '$address', '$username', '$pass')";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: qlynhanvien.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>