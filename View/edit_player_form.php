<?php
$product_id = $_POST['product_id'];

//Get the categories for the pull down menu
require_once('../Model/database.php');
$query = "SELECT*FROM categories ORDER BY categoryID";
$categories = $db->query($query);

$query = "SELECT*FROM products WHERE productID = $product_id";
$edit_product = $db->query($query);
$edit_product = $edit_product->fetch();

//Define the VALUES
$code = $edit_product['productCode'];
$name = $edit_product['productName'];
$price = $edit_product['listPrice'];
$team_id = $edit_product['categoryID'];
?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <link rel="stylesheet" type="text/css" href="/nba/css/index.css">
     <link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>

   </head>
   <body>

         <h1>Edit Product</h1>

         Product ID: <?php echo $product_id; ?><br />
         Code: <?php echo $code; ?>


         <form action="edit_player.php" method="post"
           id="edit_product_form">
           <input type="hidden" name="team_id" value="<?php echo $team_id; ?>">
           <input type="hidden" name="code" value="<?php echo $code; ?>">
           <input type="hidden" name="name" value="<?php echo $name; ?>">
           <input type="hidden" name="price" value="<?php echo $price; ?>">
           <input type="hidden" name="productID" value="<?php echo $product_id; ?>">

           <label>Team:</label>
           <select name="team_id">
           <?php foreach ($categories as $team) : ?>
             <option value="<?php echo $team['categoryID']; ?>">
               <?php echo $team['categoryName']; ?>
             </option>
           <?php endforeach; ?>
           </select><br>

         <label>Jersey:</label>
         <input name="code" type="input" value="<?php echo $code; ?>"><br>


         <label>Name:</label>
         <input name="name" type="input" value="<?php echo $name; ?>"><br>


         <label>Position:</label>
         <input name="price" type="input" value="<?php echo $price; ?>"><br>


         <label>&nbsp;</label>
         <input id="editButtonForm" type="submit" value="Edit Product"/><br>
 </form>

     <footer class="editProductFooter">
         <p>&copy; <?php echo date("Y"); ?> NBA</p>
     </footer>

   </body>
 </html>
