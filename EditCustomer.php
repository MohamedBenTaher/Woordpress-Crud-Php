<?php
require "authentication.php";
if(isset($_POST['submit'])) {
   $id = $_POST['id'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email=$_POST['email'];
   
    $data = [
    'first_name' => $firstname,
    'last_name' => $lastname,
    'email' => $email
];
echo $id;
$woocommerce->put('customers/'.$id, $data);
header('Location: index.php'); 
  } else {
    $id = $_GET['id'];
    $customer1 = json_encode($woocommerce->get('customers/'.$id));
    $customer = json_decode($customer1, true);
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
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
<div class="form-group">
                <label for="name">Firstname</label>
                <input type="text" class="form-control" name="firstname" placeholder="Firstame" value="<?php echo $customer['first_name']; ?>">
            </div>
            <div class="form-group">
                <label for="name">Lastname</label>
                <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $customer['last_name']; ?>">
            </div>
            <div class="form-group">
                <label for="regular_price">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $customer['email']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Edit">
        </form>
</body>
</html>