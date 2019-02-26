<?php
    require_once('../Model/database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY win DESC ';
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

    <!-- <h1 id="addCategoryh1">Team Standings</h1> -->
    <table id="keywords">
      <thead>
        <tr>
          <!-- <th><span>Position</span></th> -->
          <th><span>Team</span></th>
          <th><span>&nbsp;</span></th>
          <th><span>Win</span></th>
          <th><span>Loss</span></th>
          <th><span>Win%</span></th>


        </tr>
      </thead>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <!-- <td><?php echo $team['categoryID']; ?></td> -->
            <td>
              <?php echo $team['teamName']; ?>
            </td>

            <td>
              <img id="teamImage" src="../images/<?php echo $team['imgName']; ?>" style="width:29px">
            </td>

            <td>
              <?php echo $team['win']; ?>
            </td>

            <td>
              <?php echo $team['loss']; ?>
            </td>

<!-- team win percentage -->
            <td>
              <?php

                $total_games = $team['win'] + $team['loss'];
                $percent = $team['win'] /  $total_games;
                $percent_friendly = number_format( $percent * 100, 1 ) . '%';

                echo $percent_friendly;
              ?>
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
