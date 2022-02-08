<?php
require "authentication.php";
$id = $_GET['id'];
    $woocommerce->delete('users/'.$id, ['force' => true]);
    header('Location: index.php');