<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    $id = $_GET["ID_Nhanvienbanhang"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
        $sql = "UPDATE nhanvienbanhang SET Tennhanvien='$name', Sdt='$phone', Diachi='$address' 
        WHERE Id_Nhanvienbanhang LIKE '". $id ."';";
        if ($conn->query($sql) == TRUE) {
            header('Location: qlynhanvien.php');
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>