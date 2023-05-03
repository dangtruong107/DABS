<?php
    require '../../inc/config.php';
    $ID_Theloai = $_GET['ID_Theloai'];
    $sql = "DELETE FROM theloai WHERE ID_Theloai LIKE '". $ID_Theloai ."';";
    if ($conn->query($sql) === TRUE) {
        header('Location: qlydanhmuc.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
$conn->close();
?>
