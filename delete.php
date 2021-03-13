<?php
    include('connect.php');
    $id = $_GET['id'];
    $sql="DELETE  FROM nhanvien WHERE id='$id'";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    header("location:nhanvien.php");
?>