<?php
require "authentication.php";
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
$name = $_POST['name'];
$regular_price = $_POST['regular_price'];
    $data = [
    'name' => $name,
    'regular_price' => $regular_price
];
echo $id;
$woocommerce->put('products/'.$id, $data);
header('Location: index.php'); 
  } else {
    $id = $_GET['id'];
    $product = json_encode($woocommerce->get('products/'.$id));
    $product = json_decode($product, true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit product</title>
    <link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h3 class="h3">Edit Product</h3>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $product['name']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Price</label>
                <input type="number" class="form-control" name="regular_price" placeholder="Price" value="<?php echo $product['price']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Edit">
        </form>
</body>
</html>