<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Woocomerce Projet</title>
	<link rel="icon" href="../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php  
		$orders = file_get_contents('http://localhost/projectwp/orders.php');
		$orders = json_decode($orders, true);
		$customers = file_get_contents('http://localhost/projectwp/customers.php');
		$customers = json_decode($customers, true);
		$products = file_get_contents('http://localhost/projectwp/products.php');
		$products = json_decode($products, true);
	?>
	<div>
		<br><br>
		<center>
			<h3>Data Customers</h3>
		</center>
		<br><br>
	</div>
<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ( $customers as $customer ) { 
						echo "<tr><td>" . $customer["id"]."</td>
                                        <td>" . $customer['first_name']." ".$customer['last_name']."</td>
                                        <td>" . $customer["email"]."</td>
                                        <td><button><a class='btn btn-primary' href='EditCustomer.php?id=".$customer['id']."'>Update</a></button></td>
                                        <td><button onclick=\"myFunction()\"><a class='btn btn-danger' href='DeleteCustomer.php?id=".$customer['id']."'>Delete</a></button></td></tr>";
					 $i++; 
					 } ?>
				</tbody>
			</table>
			<a class="btn btn-success" href="AddCustomer.php">Ajouter un Client</a>
		</div>
	</div>
	<div>
		<br><br>
		<center>
			<h3>Data Orders Woocommerce</h3>
		</center>
		<br><br>
	</div>
<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Total</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
                                foreach($orders as $order){
                                    echo "<tr><td>" . $order["id"]."</td>
                                        <td>" . $order['billing']['first_name']." ".$order['billing']['last_name']."</td>
										<td>" . $order["date_created"]."</td>
                                        <td>" . $order["status"]."</td>
										<td>" . $order["total"]."</td>
                                
                                       
                                        
                                        <td><button><a class='btn btn-primary' href='EditOrder.php?id=".$order['id']."'>Update</a></button></td>
                                        <td><button onclick=\"myFunction()\"><a class='btn btn-danger' href='deleteOrder.php?id=".$order['id']."'>Delete</a></button></td></tr>";
                                }
                            ?>
				</tbody>
			</table>
			<a class="btn btn-success" href="AddOrder.php">Ajouter une commande</a>
		</div>
	</div>
	<center><h2 class="sub-header">Liste des Produits</h2></center>	
            <div class='table-responsive'>
                <table id='myTable' class='table table-hover'>
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Total Sales</th>
                            <th>Picture</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                foreach($products as $product){
                                    echo "<tr><td>" . $product["id"]."</td>
                                        <td>" . $product["name"]."</td>
                                        <td>" . $product["status"]."</td>
                                        <td>" . $product["price"]."</td>
                                        <td>" . $product["total_sales"]."</td>
                                        <td><img height='50px' width='50px' src='".$product["images"][0]["src"]."' ></td>
                                        <td><button><a class='btn btn-primary' href='EditProduct.php?id=".$product['id']."'>Update</a></button></td>
                                        <td><button onclick=\"myFunction()\"><a class='btn btn-danger' href='delete.php?id=".$product['id']."'>Delete</a></button></td></tr>";
                                }
                            ?>
                    </tbody>
                </table>
                <a class="btn btn-success" href="AddProduct.php">Ajouter un produit</a>
                <script>
function myFunction() {
  confirm("do you want delete this item?");
}
</script>
</body>
</html>