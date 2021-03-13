<?php
    include('connect.php');
    $sql="SELECT * FROM test";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    var_dump($row);
?>