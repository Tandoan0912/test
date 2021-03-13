<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
    include('connect.php');
    $sql="SELECT * FROM nhanvien";
    $stmt = $conn->prepare($sql);
	$query = $stmt->execute();
    $result = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
?>
<body>
<div class="container">
    <a href="create.php" class="btn btn-primary">Create</a>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>job</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($result as $item): ?>
      <tr>
        <td><?php echo $item['id']; ?></td>
        <td><?php echo $item['ten']; ?></td>
        <td><?php echo $item['viec']; ?></td>
        <th><a href="edit.php?id=<?php echo $item['id'];?>">Sửa</a></th>
		<th><a href="delete.php?id=<?php echo $item['id'];?>">Xóa</a></th>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>

</body>
</html>
