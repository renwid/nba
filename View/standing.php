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
    <link rel="shortcut icon" type="image/png" href="../images/favicon.ico"/>
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>

</head>

<!-- the body section -->

<body>
    <main id="standingListMain">

    <h1 id="addCategoryh1">Team Standings</h1>
    <table id="keywords">
      <thead>
        <tr>
          <th><span>Position</span></th>
          <th><span>Team</span></th>
          <th><span>&nbsp;</span></th>
        </tr>
      </thead>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td><?php echo $team['categoryID']; ?></td>
            <td>
              <?php echo $team['teamName']; ?>
            </td>

              <td>
                <img id="teamImage" src="../images/<?php echo $team['imgName']; ?>" style="width:29px">
              </td>

        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    </main>
    <!-- <footer id="standingListFooter">
        <p>&copy; <?php echo date("Y"); ?> NBA</p>
    </footer> -->

    <script type="text/javascript">
$(function(){
  $('#keywords').tablesorter();
});
</script>
</body>
</html>
