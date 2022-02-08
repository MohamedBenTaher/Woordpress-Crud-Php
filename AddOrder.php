<?php
require "authentication.php";
if(isset($_POST['submit'])) {
    $order = $_POST['order'];
   $firstname = $_POST['firstame'];
   $lastname = $_POST['lastame'];
   $date = $_POST['date'];
   $status = $_POST['status'];
   $total = $_POST['total'];
   

$data = [
    'number' => $order,
    'billing.firstname' => $firstname,
    'billing.lastname' => $lastname,
    'date'=>$date,
    'status'=>$status,
    'total'=>$total
];
$woocommerce->post('orders', $data);
header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ajouter Commande</title>
</head>
<body>
    <h3 class="h3">Ajouter Une Commande</h3>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group">
                <label for="name">Order</label>
                <input type="number" class="form-control" name="order" placeholder="Order Number">
            </div>
            <div class="form-group">
                <label for="name">Firstname</label>
                <input type="text" class="form-control" name="name" placeholder="Latsname">
            </div>
            <div class="form-group">
                <label for="regular_price">LastName</label>
                <input type="text" class="form-control" name="regular_price" placeholder="Lastname">
            </div>
            <div class="form-group">
                <label for="regular_price">Date</label>
                <input type="date" class="form-control" name="regular_price" placeholder="date">
            </div>
            <div class="form-group">
                <label for="regular_price">Status</label>
                <input type="text" class="form-control" name="regular_price" placeholder="Status">
            </div>
            <div class="form-group">
                <label for="regular_price">Total</label>
                <input type="float" class="form-control" name="regular_price" placeholder="Total">
            </div>
            <input type="submit" name="submit" value="ADD">
        </form>
</body>
</html>