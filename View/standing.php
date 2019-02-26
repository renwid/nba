<?php
    require_once('../Model/database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $teams = $statement->fetchAll();
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
    <main id="standingListMain">

    <h1 id="addCategoryh1">Team Standings</h1>
    <table id="standingListTable">
        <tr>
            <th>Team</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td><?php echo $team['categoryID']; ?></td>
            <td>
              <?php echo $team['teamName']; ?>
            </td>

              <td>
                <img id="teamImage" src="images/<?php echo $team['imgName']; ?>" style="width:29px">
              </td>

        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    </main>
    <!-- <footer id="standingListFooter">
        <p>&copy; <?php echo date("Y"); ?> NBA</p>
    </footer> -->
</body>
</html>
