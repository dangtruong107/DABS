<?php
    require '../../inc/config.php';
    $ID_Doitac = $_GET['ID_Doitac'];
    $sql = "DELETE FROM doitac WHERE ID_Doitac LIKE '". $ID_Doitac ."';";
    if ($conn->query($sql) === TRUE) {
        header('Location: qlynxb.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
$conn->close();
?>
