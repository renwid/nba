<?php
// Get the team data
$name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($name == null) {
    $error = "Invalid team data. Check all fields and try again.";
    include('../Error/error.php');
} else {
    require_once('../Model/database.php');

    // Add the player to the database
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:team_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':team_name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the team List page
    include('team_list.php');
}
?>
