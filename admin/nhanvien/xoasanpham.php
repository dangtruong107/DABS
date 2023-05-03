<?php
    require '../../inc/config.php';
    $id = $_GET['ID_Sanpham'];
    $sql = "DELETE FROM sanpham WHERE ID_Sanpham=".$id;

    if ($conn->query($sql) === TRUE) {
        header('Location: qlysanpham.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
