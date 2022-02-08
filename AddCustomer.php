<?php
require "authentication.php";
if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email=$_POST['email'];
   

$data = [
    'first_name' => $firstname,
    'last_name' => $lastname,
    'email' => $email
];
$woocommerce->post('customers', $data);
header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Customer</title>
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
                <input type="text" class="form-control" name="firstname" placeholder="Firstame">
            </div>
            <div class="form-group">
                <label for="name">Lastname</label>
                <input type="text" class="form-control" name="lastname" placeholder="Lastname">
            </div>
            <div class="form-group">
                <label for="regular_price">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <input type="submit" name="submit" value="ADD">
        </form>
</body>
</html>