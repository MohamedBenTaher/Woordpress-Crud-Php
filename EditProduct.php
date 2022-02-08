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
</head>
<body>
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