<?php
if(!isset($_SESSION)) 
{
session_start();
$kq = "";
if(isset($_POST['loginQuanly']))
{

    require '../../inc/config.php';
    $tk = $_POST['Tendangnhap'];
    $mk = $_POST['Matkhau'];
    $sql="SELECT * FROM quanly  where Tendangnhap = '$tk'  and Matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['Tendangnhap'] = $row["Tendangnhap"];
            header('Location: index.php');
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