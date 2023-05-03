<?php
if(isset($_POST['create']))
{
    require '../../inc/config.php';
    $name = $_POST['name'];
    $sql="INSERT INTO  theloai (Tentheloai) 
    VALUES ('$name')";
    if (mysqli_query($conn, $sql)) {
        header('Location: qlydanhmuc.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>