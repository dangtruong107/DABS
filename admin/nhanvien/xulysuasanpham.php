<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    move_uploaded_file($_FILES['hinhanh']['tmp_name'] , '../../images/'.$_FILES['hinhanh']['name']);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $matheloai = $_POST['theloai'];
    $madoitac = $_POST['doitac'];
    $gia = $_POST['gia'];
    $mota = $_POST['editor1'];
    $anh =  $_POST['anh'];
    $tacgia = $_POST['tacgia'];
    if($hinhanh == null)
    {
        $sql = "UPDATE sanpham SET Tensanpham='$name',Theloai='$matheloai', Anh='$anh', Tacgia='$tacgia', ID_Doitac= '$madoitac',Gia='$gia', 
        Mota='$mota'
        WHERE ID_Sanpham= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else{
        $sql = "UPDATE sanpham SET Tensanpham='$name',Theloai='$matheloai', Anh='$hinhanh', Tacgia='$tacgia', ID_Doitac= '$madoitac',Gia='$gia',
        Mota='$mota'
        WHERE ID_Sanpham= '$id ' " ;
        if ($conn->query($sql) === TRUE) {
            header('Location: qlysanpham.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        }
    }
?>
