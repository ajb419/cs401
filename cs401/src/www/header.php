<?php
  session_start();
  $_SESSION['authenticated'];
?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="slideShow.JS"> </script>
  <title>Seasonal Improvements</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
  <link href="pics/fav.JPG" type="image" rel="shortcut icon">
  <link rel="stylesheet" type="text/css" href="main.css?v=<?php echo time(); ?>" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div id="header">
  <div id=hhead>
    <h1>Seasonal Improvements</h1>
  </div>
  <div id="phead">
    <p>Best remodeling and handyman company in Boise... really</p>
  </div>
  <div id="nav">
    <ol>
      <li><a class="inactive" <?php if ($pagename == "Home") { echo "id = 'active';"; } ?>href="index.php">Home</a></li>
      <li><a class="inactive" <?php if ($pagename == "Contact") { echo "id = 'active';"; } ?>href="contact.php">Contact</a></li>
      <li><a class="inactive" <?php if ($pagename == "Discounts") { echo "id = 'active';"; } ?>href="discounts.php">Discounts</a></li>
      <li><a class="inactive" <?php if ($pagename == "Testimonials") { echo "id = 'active';"; } ?>href="testimonials.php">Testimonials</a></li>
      <li><a class="inactive" <?php if ($pagename == "Login") { echo "id = 'active';"; } ?>href="login.php">Login</a></li>
    </ol>
    <?php
      if ($_SESSION['authenticated'] == true){
        echo '<form action="form_processors/logout.php" method="post">';
        echo '<button name="logout" type="logout" id="logout">Logout</button>';
        echo '</form>';
      }
    ?>
  </div>
</div>
