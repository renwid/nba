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
    $query = "INSERT INTO categories (image) VALUES ('$image')";

    // execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");

    // Display the Category List page
    include('team_list.php');
}


?>
