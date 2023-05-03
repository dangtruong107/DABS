<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    $phone = $_GET['Sdt'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $address = $_POST['address'];
        $sql = "UPDATE khachhang SET Matkhau='$pass', Tenkhach='$name', Diachi='$address' 
        WHERE Sdt LIKE '". $phone ."';";
        if ($conn->query($sql) == TRUE) {
            header('Location: qlykhachhang.php');
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>