<?php

$team_id = $_POST['team_id'];
$jersey = $_POST['code'];
$name = $_POST['name'];
$position = $_POST['position'];
if(isset($_POST['playerID'])){ $player_id = $_POST['playerID']; }

if(empty($jersey) || empty($name) || empty($position)){
  $error = "Invalid product data.";
  include('../Error/error.php');
} else{
  require_once('../Model/database.php');
  $query = "UPDATE products SET categoryID = '$team_id', playerJersey = '$jersey', playerName = '$name', playerPosition = '$position' WHERE playerID = '$player_id'";
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();


  include('../index.php');
}

 ?>
