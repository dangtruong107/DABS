<?php
if(!isset($_SESSION)) 
{
session_start();
$kq = "";
if(isset($_POST['loginNhanvien']))
{

    require '../../inc/config.php';
    $tk = $_POST['Tendangnhap'];
    $mk = $_POST['Matkhau'];
    $sql="SELECT * FROM nhanvienbanhang  where Tendangnhap = '$tk'  and Matkhau = '$mk'  ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['Tendangnhap'] = $row["Tendangnhap"];
            header('Location: indexNhanvien.php');
            $row = $result->fetch_assoc();  
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
}
?>