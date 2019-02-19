<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

</head>

<!-- the body section -->

<body>
    <main>
    <h1 id="addCategoryh1">Teams</h1>
    <table id="categoryListTable">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input id="deleteCategoryList" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2 id="add_category_h2">Add Team</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">

        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_category_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">View Team List</a></p>

    </main>
    <footer id="categoryListFooter">
        <p>&copy; <?php echo date("Y"); ?> NBA</p>
    </footer>
</body>
</html>
