<?php
require "authentication.php";
if(isset($_POST['submit'])) {
   $id = $_POST['id'];
   $firstname = $_POST['firstame'];
   $lastname = $_POST['lastame'];
   $date = $_POST['date'];
   $status = $_POST['status'];
   $total = $_POST['total'];
   
    $data = [
        'number' => $order,
        'billing.first_name' => $firstname,
        'billing.last_name' => $lastname,
        'date'=>$date,
        'status'=>$status,
        'total'=>$total
];
echo $id;
$woocommerce->put('orders/'.$id, $data);
header('Location: index.php'); 
  } else {
    $id = $_GET['id'];
    $order1 = json_encode($woocommerce->get('orders/'.$id));
    $order = json_decode($order1, true);
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
                <label for="name">Order Number</label>
                <input type="number" class="form-control" name="id" placeholder="id" value="<?php echo $order['id']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Firstname</label>
                <input type="text" class="form-control" name="firstname" placeholder="firstname" value="<?php echo $order['billing']['first_name']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">LastName</label>
                <input type="text" class="form-control" name="lastname" placeholder="lastname" value="<?php echo $order['billing']['last_name']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Status</label>
                <input type="text" class="form-control" name="status" placeholder="Current Status" value="<?php echo $order['status']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Date</label>
                <input type="date" class="form-control" name="date" placeholder="Date" value="<?php echo $order['date_created']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Total</label>
                <input type="number" class="form-control" name="total" placeholder="Total" value="<?php echo $order['total']; ?>">
            </div>
            <input type="text" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Edit">
        </form>
</body>
</html>