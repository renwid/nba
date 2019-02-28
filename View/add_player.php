<?php
// Get the product data
$player_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);
$jersey = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$position = filter_input(INPUT_POST, 'position');

// Validate inputs
if ($team_id == null || $team_id == false ||
        $jersey == null || $name == null || $position == null || $position == null) {
    $error = "Invalid player data. Check all fields and try again.";
    include('../Error/error.php');
} else {
    require_once('../Model/database.php');

    // Add the player to the database
    $query = 'INSERT INTO products
                 (categoryID, playerJersey, playerName, playerPosition)
              VALUES
                 (:team_id, :code, :name, :position)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->bindValue(':code', $jersey);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':position', $position);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('../index.php');
}
?>
