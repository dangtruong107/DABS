<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    $id = $_GET["ID_Doitac"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
        $sql = "UPDATE doitac SET Tendoitac='$name', Sdt='$phone', Diachi='$address' 
        WHERE Id_Doitac LIKE '". $id ."';";
        if ($conn->query($sql) == TRUE) {
            header('Location: qlynxb.php');
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>