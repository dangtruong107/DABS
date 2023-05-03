<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    $id = $_GET["id"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];
        $sql = "UPDATE donhang SET Diachi='$address', Trangthaidonhang='$status'
        WHERE ID_Donhang LIKE '". $id ."';";
        if ($conn->query($sql) == TRUE) {
            header('Location: qlydonhang.php');
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>