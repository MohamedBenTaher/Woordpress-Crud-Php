<?php
require "authentication.php";
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
$regular_price = $_POST['regular_price'];

$data = [
    'name' => $name,
    'regular_price' => $regular_price
];
$woocommerce->post('products', $data);
header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product</title>
</head>
<body>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="regular_price">Price</label>
                <input type="number" class="form-control" name="regular_price" placeholder="Price">
            </div>
            <input type="submit" name="submit" value="ADD">
        </form>
</body>
</html>