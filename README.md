## Table of Contents

> Click on one of the options:

- [Code](#code)
- [Features](#features)
- [Made](#made)
- [License](#license)
---

## Code

- A simple PHP calculation to find out each team's win percentage

```php
//Calculating team win percentage

    $total_games = $team['win'] + $team['loss'];
    $percent = $team['win'] /  $total_games;
    $percent_friendly = number_format( $percent * 100, 1 ) . '%';

    echo $percent_friendly;

```
:point_down:

![GIF](https://i.gyazo.com/becf287f8db0a0cabe5aa7dd955e904d.gif?_ga=2.234696856.745103909.1551221898-228063269.1547928545)

### Adding a team image

- **Setting up the directory where images will be saved**
    - ```php
         // This is the directory where images will be saved
         $target = "../images/";
         $target = $target . basename( $_FILES['image']['name']);
      ```
- **Next, we want to add the image to the database**
    - ```php
         // Add the image to the database
         $query = "INSERT INTO categories (image) VALUES ('$image')";

         // execute query
         mysqli_query($db, $sql);

         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            }else{
            $msg = "Failed to upload image";
           }
         }
         $result = mysqli_query($db, "SELECT * FROM images");
      ```
- **Finally we want to display it on the page**
    - ```php
      // Displaying the image
      <form action="add_team.php" method="post" enctype="multipart/form-data" id="add_category_form">
        <input type="file" name="image" id="image" style="padding-top:20px">
        <input id="add_category_button" type="submit" value="Add">
      </form>
      ```
[![Team Image](https://i.imgur.com/CUUzpdm.png)](height=900)

---

## Features

> Adding **new** player and editing **existing** player

![GIF](https://i.gyazo.com/e6cb5e59acc322184de98e07189b8c63.gif?_ga=2.264340428.2127822680.1551223246-228063269.1547928545)

![GIF](https://i.gyazo.com/92527c80c4f23ae548580941c5593cb8.gif?_ga=2.193676142.2127822680.1551223246-228063269.1547928545)

---

## Made

> By:

| <a href="http://www.google.com" target="_blank">**Renzo W**</a>
| :---: |
| [![renwid](https://i.imgur.com/8mkpIBh.jpg)](http://google.com)
| <a href="http://github.com/renwid" target="_blank">`github.com/renwid`</a> |

- With :atom:
- and the help ***google***

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
- Copyright 2019 © <a href="http://nba.com" target="_blank">NBA</a>.
