<?php
if(isset($_POST['create']))
{
    require '../../inc/config.php';
    var_dump($_POST); return;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql="INSERT INTO  doitac (ID_Doitac, Tendoitac, Sdt, Diachi) 
    VALUES ('$id', '$name', '$phone', '$address')";
    if (mysqli_query($conn, $sql)) {
        header('Location: qlynxb.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>