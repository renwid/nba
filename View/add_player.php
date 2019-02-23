<?php
// Get the product data
$player_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');

// Validate inputs
if ($team_id == null || $team_id == false ||
        $code == null || $name == null || $price == null || $price == null) {
    $error = "Invalid player data. Check all fields and try again.";
    include('../Error/error.php');
} else {
    require_once('../Model/database.php');

    // Add the player to the database
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:team_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('../index.php');
}
?>
