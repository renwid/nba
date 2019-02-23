<?php

$team_id = $_POST['team_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
if(isset($_POST['productID'])){ $player_id = $_POST['productID']; }

if(empty($code) || empty($name) || empty($price)){
  $error = "Invalid product data.";
  include('../Error/error.php');
} else{
  require_once('../Model/database.php');
  $query = "UPDATE products SET categoryID = '$team_id', productCode = '$code', productName = '$name', listPrice = '$price' WHERE productID = '$player_id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();


  include('../index.php');
}

 ?>
