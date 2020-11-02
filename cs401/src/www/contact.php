<?php
  $pagename = "Contact";
  require_once "header.php";
?>

<body>
  <?php
    require_once "contactInfo.php";
  ?>

  <div id="contactHeader">
    <h2>Shy? Me too sometimes. But if you fill out this form I promise to call.</h2>
  </div>
  <div class="forms">
    <form action="form_processors/contact_handler.php" method="post">

      <label for="name">Name </label>
      <input type="text" id="name" name="name" value="<?= $_SESSION['name'] ?>" placeholder="What's your name?">
      <div class="error"><?= $_SESSION['bad_name'] ?></div>

      <label for="phone">Phone Number </label>
      <input type="text" id="phone" name="phone" value="<?= $_SESSION['phone'] ?>" placeholder="How about a phone number..">
      <div class="error"><?= $_SESSION['bad_phone'] ?></div>

      <label for="email">Email </label>
      <input type="text" id="email" name="email" value="<?= $_SESSION['email'] ?>" placeholder="Maybe an email too..">
      <div class="error"><?= $_SESSION['bad_email'] ?></div>

      <label for="description">Description </label>
      <textarea type="text" id="description" name="description" placeholder="Tell me about your project.."><?php if(isset($_POST['submit'])) { echo htmlentities ($_POST['description']);} echo $_SESSION['description']?></textarea>

      <button name="submit" type="submit" id="contactSubmit"  data-submit="...Sending">Submit</button>

      <div class="success"><?= $_SESSION['success'] ?></div>
    </form>
  </div>

</body>

<?php
  require_once "footer.php";
?>
