<?php
     include('connect.php');
     $id = $_GET['id'];
     $sql="SELECT * FROM nhanvien WHERE id='$id'";
     $stmt = $conn->prepare($sql);
	$query = $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }

    if(!empty($_POST['submit'])){
        $name = $_POST['name'];
        $job = $_POST['job'];
        $sql1="UPDATE nhanvien SET ten='$name',viec='$job' WHERE id='$id'";
        var_dump($sql1);
        $stmt = $conn->prepare($sql1);
	    $query = $stmt->execute();
        if($query){
            header("location:nhanvien.php");
        }
        else{
            echo "that bai";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h1>EDIT</h1>
            <div class=" form-group">
                <label>Name</label>
                <?php foreach($result as $item): ?>
                    <input type="text" class="form-control" name="name" value="<?php echo $item['ten'];?>">
                <?php endforeach ?>
            </div>
            <div class=" form-group">
                <label>Job</label>
                <?php foreach($result as $item): ?>
                    <input type="text" class="form-control" name="job" value="<?php echo $item['viec'];?>">
                <?php endforeach ?>
            </div>
            <div class="form-group">
                <input type="submit" value="save" name="submit" class="btn btn-default">
            </div>
        </form>
    </div>
</body>
</html>