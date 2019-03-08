<?php
$product_id = $_POST['product_id'];

//Get the categories for the pull down menu
require_once('../Model/database.php');
$query = "SELECT*FROM categories ORDER BY categoryID";
$categories = $db->query($query);

$query = "SELECT*FROM products WHERE playerID = $product_id";
$edit_product = $db->query($query);
$edit_product = $edit_product->fetch();

//Define the VALUES
$jersey = $edit_product['playerJersey'];
$name = $edit_product['playerName'];
$position = $edit_product['playerPosition'];
$team_id = $edit_product['categoryID'];
?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <link rel="stylesheet" type="text/css" href="../css/index.css">
     <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

   </head>
   <body>

     <header><h1 id="addProducth1">Edit Player</h1></header>


         <form action="edit_player.php" method="post"
           id="add_product_form">
           <input type="hidden" name="team_id" value="<?php echo $team_id; ?>">
           <input type="hidden" name="code" value="<?php echo $jersey; ?>">
           <input type="hidden" name="name" value="<?php echo $name; ?>">
           <input type="hidden" name="position" value="<?php echo $position; ?>">
           <input type="hidden" name="playerID" value="<?php echo $product_id; ?>">

           <label>Team:</label>
           <select name="team_id">
           <?php foreach ($categories as $team) : ?>
             <option value="<?php echo $team['categoryID']; ?>">
               <?php echo $team['teamName']; ?>
             </option>
           <?php endforeach; ?>
           </select><br>

           <label id="label1">Jersey:</label>
         <input name="code" type="input" value="<?php echo $jersey; ?>"><br>


         <label id="label2">Name:</label>
         <input name="name" type="input" value="<?php echo $name; ?>"><br>


         <label id="label3">Position:</label>
         <input name="position" type="input" value="<?php echo $position; ?>"><br>


         <label>&nbsp;</label>
         <input id="addProduct3" type="submit" value="Edit Player"/><br>
 </form>

     <footer id="add_product_formFooter">
         <p>&copy; <?php echo date("Y"); ?> NBA</p>
     </footer>

   </body>
 </html>
