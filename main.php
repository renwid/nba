<?php
require_once('database.php');

// Get team ID
$team_id= filter_input(INPUT_GET, 'team_id', FILTER_VALIDATE_INT);
if ($team_id == NULL || $team_id == FALSE) {
    $team_id = 1;
}

// Get name for selected team
$queryTeam = 'SELECT * FROM categories
                      WHERE categoryID = :team_id';
$statement1 = $db->prepare($queryTeam);
$statement1->bindValue(':team_id', $team_id);
$statement1->execute();
$team = $statement1->fetch();
$team_name = $team['categoryName'];
$statement1->closeCursor();

// Get all team
$queryAllCategories = 'SELECT * FROM categories
                           ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected team
$queryPlayers = 'SELECT * FROM products
              WHERE categoryID = :team_id
              ORDER BY productID';
$statement3 = $db->prepare($queryPlayers);
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
    <link rel="stylesheet" type="text/css" href="css/main.css" /> <!-- Access to sub folder -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

</head>

<body>

  <header>

  </header>

<main>
    <aside>
        <!-- display a list of categories -->
        <h2 id="teamh2">Teams</h2>
        <nav>
          <ul class="indexBrands">
            <?php foreach ($categories as $team) : ?>
              <li>
                <a href="?team_id=<?php echo $team['categoryID']; ?>">
                    <?php echo $team['categoryName']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
    </aside>
<!-- display a table of players -->
        <h2 id="categoryName"><?php echo $team_name; ?></h2>
        <div id = "tablePosition">


        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>

            </tr>

            <?php foreach ($players as $player) : ?>
            <tr>
                <td><?php echo $player['productCode']; ?></td>
                <td><?php echo $player['productName']; ?></td>
                <td><?php echo $player['listPrice']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
      </div>

        <div id="joinUs1">
        <p id="joinUs3"><a href="test.html">View Leaderboard</a></p>
        </div>
</main>
<footer></footer>
</body>
</html>
