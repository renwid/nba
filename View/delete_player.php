<?php
require_once('../Model/database.php');

// Get IDs
$player_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($player_id != false && $team_id != false) {
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $player_id);
    $success = $statement->execute();
    $statement->closeCursor();
}

// Display the Product List page
include('../index.php');
