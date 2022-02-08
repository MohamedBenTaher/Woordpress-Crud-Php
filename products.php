<?php 
require "authentication.php";
echo json_encode($woocommerce->get('products'));
?>