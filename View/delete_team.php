<?php
// Get ID
$team_id = filter_input(INPUT_POST, 'team_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($team_id == null || $team_id == false) {
    $error = "Invalid category ID.";
    include('../Error/error.php');
} else {
    require_once('../Model/database.php');

    // Add the product to the database
    $query = 'DELETE FROM categories
              WHERE categoryID = :team_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_id', $team_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('team_list.php');
}
?>
