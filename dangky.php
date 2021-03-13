<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
    require_once("connect.php");
    if(isset($_POST['submit'])){
        include('connect.php');
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        $sql="INSERT INTO test(user,pass) VALUES ('$user','$pass')";
        $query=mysqli_query($conn,$sql);
        header("location:index.php");
    }
?>
<body>
    <div class="container">
        <h1>DangKy</h1>
        <form method="POST">
            <div class=" orm-group">
                <label>Email</label>
                <input type="text" class="form-control" id="text" name="user">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="pass">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-default">
            </div>
        </form>
    </div>
</body>
</html>