<?php
if(isset($_POST['create']))
{
    require '../../inc/config.php';
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql="INSERT INTO  khachhang (Tenkhach, Sdt, Matkhau, Diachi) 
    VALUES ('$name', '$phone','$pass','$address')";
    if (mysqli_query($conn, $sql)) {
        header('Location: qlykhachhang.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>