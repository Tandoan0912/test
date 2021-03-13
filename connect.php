<?php
//Khai báo biến 
$server_username = "root";
$server_password = "";
$server_host = "localhost"; //hostmặc định trên local
$database = 'dn';    //khai báo tên csdl 

//Truyền biến vào hàm kế nối. Bây giờ php sử dụng "mysqli" thay vì "mysql" nên truy vấn dung mysql sẽ lỗi
//Ví dụ truy vấn tài khoản đăng nhập
//mysqli_query($conn,"SELECT username, password FROM user WHERE username='$username'");  --OKE--
//mysql_query($conn,"SELECT username, password FROM user WHERE username='$username'");  --Lỗi--

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>