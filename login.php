<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/config.php';
    if(isset($_POST['txtus']))
    {
        $tk = $_POST['txtus'] ; 
    }if(isset($_POST['txtus']))
    {
        $mk = $_POST['txtem'];
    }
	$sql = "SELECT * FROM khachhang  where Sdt = '$tk'  and Matkhau = '$mk'  ";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $_SESSION['txtus'] = $tk;
			$_SESSION['Tenkhach'] = $row["Tenkhach"];
			$_SESSION['Sdt'] = $row["Sdt"];
			$_SESSION['Diachi'] = $row["Diachi"];
            header('Location: index.php');
            $row = $result->fetch_assoc();  
        }         
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>