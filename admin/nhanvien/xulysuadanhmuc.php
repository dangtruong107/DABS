<?php 
    if(isset($_POST['Edit']))
    {
    require '../../inc/config.php';
    $id = $_GET["ID_Theloai"];
    $name = $_POST['name'];
        $sql = "UPDATE theloai SET Tentheloai='$name'
        WHERE Id_Theloai LIKE '". $id ."';";
        if ($conn->query($sql) == TRUE) {
            header('Location: qlydanhmuc.php');
        } 
        else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>