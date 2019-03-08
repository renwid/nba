<?php


    require_once('../Model/database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY win DESC';
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
    <main>
    <h1 id="addCategoryh1">Team List</h1>
    <table id="categoryListTable">
        <tr>
            <th>Team Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($teams as $team) : ?>
        <tr>
            <td><?php echo $team['teamName']; ?></td>
            <td><img src="../images/<?php echo $team['imgName']; ?>" style="width:29px"></td>
            <td><?php echo $team['win']; ?></td>
            <td><?php echo $team['loss']; ?></td>

            <td>
                <form action="delete_team.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="team_id"
                           value="<?php echo $team['categoryID']; ?>">
                    <input id="deleteCategoryList" type="submit" value="Delete">
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>


    <h2 id="add_category_h2">Add Team</h2>
    <form action="add_team.php" method="post" enctype="multipart/form-data" id="add_category_form">

        <label>Name:</label>
        <input type="text" name="team_name">

        <label id="add_team_win">Win:</label>
        <input type="text" name="team_win">

        <label id="add_team_loss">Loss:</label>
        <input type="text" name="team_loss">

        <input type="file" name="image" id="image" style="padding-top:20px">
        <input id="add_category_button" type="submit" value="Add">
    </form>



    <br>
    <p><a href="../index.php">View Team List</a></p>

    </main>
    <!-- <footer id="categoryListFooter">
        <p>&copy; <?php echo date("Y"); ?> NBA</p>
    </footer> -->
</body>
</html>
