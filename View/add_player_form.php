<?php
require('../Model/database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>NBA</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
</head>

<!-- the body section -->
<body>
    <header><h1 id="addProducth1">Add Player</h1></header>

    <main>
        <h1></h1>
        <form action="add_player.php" method="post"
              id="add_product_form">

            <label>Team Name:</label>
            <select name="team_id">
            <?php foreach ($categories as $team) : ?>
                <option value="<?php echo $team['categoryID']; ?>">
                    <?php echo $team['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label id="label1">Jersey:</label>
            <input type="text" name="code"><br>

            <label id="label2">Name:</label>
            <input type="text" name="name"><br>

            <label id="label3">Position:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input id="addProduct3" type="submit" value="Add Player"><br>
        </form>
        <p><a href="../index.php">View Team List</a></p>
    </main>

    <footer id="add_product_formFooter">
        <p>&copy; <?php echo date("Y"); ?> NBA</p>
    </footer>
</body>
</html>
