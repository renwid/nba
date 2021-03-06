<?php
require_once('Model/database.php'); //calls the database.php file to validate the user

//Get Team ID
if (!isset($team_id)) {
    $team_id = filter_input(INPUT_GET, 'team_id', FILTER_VALIDATE_INT);
    if ($team_id == NULL || $team_id == FALSE) {
        $team_id = 1;
    }
}

//Get name for selected team
$queryTeam = 'SELECT * FROM categories
                  WHERE categoryID = :team_id';
$statement1 = $db->prepare($queryTeam);
$statement1->bindValue(':team_id', $team_id);
$statement1->execute();
$team = $statement1->fetch();
$team_name = $team['teamName'];
$statement1->closeCursor();

// Get all teams
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected team
$queryProducts = 'SELECT * FROM products
                  WHERE categoryID = :team_id
                  ORDER BY playerID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':team_id', $team_id);
$statement3->execute();
$players = $statement3->fetchAll();
$statement3->closeCursor();

 ?>

 <!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>NBA</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
</head>

<!-- the body section -->
<body>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Teams</h2>
        <!-- If there is an error with selecting brands this code below is the reason why -->
        <nav>
          <ul class="ulIndex">
              <?php foreach ($categories as $team) : ?>
          <li><a id="aManager" href=".?team_id=<?php echo $team['categoryID']; ?>">
                  <?php echo $team['teamName']; ?>
              </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </aside>
    <section>
        <!-- display a table of players -->
        <h2 id="categoryNameh2"><?php echo $team_name; ?></h2>
        <table id="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($players as $player) : ?>
            <tr>
              <td><?php echo $player['playerJersey']; ?></td>
              <td><?php echo $player['playerName']; ?></td>
              <td><?php echo $player['playerPosition']; ?></td>

                <!-- Delete player -->
                <td><form action="View/delete_player.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $player['playerID']; ?>">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['categoryID']; ?>">
                    <input id="editButton" type="submit" value="Delete">
                </form></td>

                <!-- Update player -->
                <td><form action="View/edit_player_form.php" method="post" id="edit_product_form">
                    <input type="hidden" name="product_id"
                           value="<?php echo $player['playerID']; ?>">
                    <input type="hidden" name="team_id"
                           value="<?php echo $player['categoryID']; ?>">
                    <input id="editButton" type="submit" value="Edit">
                </form></td>

            </tr>
            <?php endforeach; ?>
        </table>

        <p id="addProduct1"><a href="View/add_player_form.php">Add Players</a></p>
        <p id="addProduct2"><a href="View/team_list.php">Add Team</a></p>
        <p id="addProduct4"><a href="main.php">View Main</a></p>
        <p id=""><a href="View/standing.php">View Standings</a></p>

    </section>
</main>
<footer id="indexFooter">
    <p>&copy; <?php echo date("Y"); ?> NBA</p>
</footer>
</body>
</html>
