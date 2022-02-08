<?php
require "authentication.php";
$id = $_GET['id'];
    $woocommerce->delete('orders/'.$id, ['force' => true]);
    header('Location: index.php');