<?php

$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
if(isset($_POST['productID'])){ $product_id = $_POST['productID']; }

if(empty($code) || empty($name) || empty($price)){
  $error = "Invalid product data.";
  include('error.php');
} else{
  require_once('database.php');
  $query = "UPDATE products SET categoryID = '$category_id', productCode = '$code', productName = '$name', listPrice = '$price' WHERE productID = '$product_id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();


  include('index.php');
}

 ?>
