<?php
    require '../../inc/config.php';
    $ID_Nhanvienbanhang = $_GET['ID_Nhanvienbanhang'];
    $sql = "DELETE FROM nhanvienbanhang WHERE ID_Nhanvienbanhang LIKE '". $ID_Nhanvienbanhang ."';";
    if ($conn->query($sql) === TRUE) {
        header('Location: qlynhanvien.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
$conn->close();
?>
