<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Goods Dept</title>
    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/landing.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type = "text/javascript" language = "javascript">

      $(document).ready(function() {
        const left = document.querySelector(".left");
    const right = document.querySelector(".right");
    const container = document.querySelector(".container");

    left.addEventListener("mouseenter", () => {
      container.classList.add("hover-left");
    });

    left.addEventListener("mouseleave", () => {
      container.classList.remove("hover-left");
    });

    right.addEventListener("mouseenter", () => {
      container.classList.add("hover-right");
    });

    right.addEventListener("mouseleave", () => {
      container.classList.remove("hover-right");
    });
    });
    </script>
  </head>
  <body>
    <div class="container">
      <div class="split left">
        <h1> Customer</h1>
        <a href="main.php" class="button">Enter</a>
      </div>
      <div class="split right">
        <h1>Manager</h1>
        <a href="index.php" class="button">Enter</a>
      </div>
    </div>
  </body>
</html>
