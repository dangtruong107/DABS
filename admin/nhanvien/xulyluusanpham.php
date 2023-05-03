<?php
if(isset($_POST['create']))
{
    require '../../inc/config.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $matheloai = $_POST['matheloai'];
    $madoitac = $_POST['madoitac'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../../images/'.$_FILES['hinhanh']['name']);
    $gia = $_POST['gia'];
    $tacgia = $_POST['tacgia'];
    $mota = $_POST['editor1'];
    $sql="INSERT INTO  sanpham (ID_Sanpham,ID_Doitac,Tensanpham,Theloai,Anh,Tacgia,Gia,Mota) 
    VALUES ('$id','$madoitac','$name','$matheloai','$hinhanh','$tacgia','$gia','$mota') ";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: qlysanpham.php');

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>