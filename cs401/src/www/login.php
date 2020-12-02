<?php
  $pagename = "Login";
  require_once "header.php";
?>
<body>
  <div class="loginHeader">
    <h2>Sign Up!</h2>
  </div>

  <div class="log_forms">
    <form action="form_processors/signup_handler.php" method="post">

      <label for="name">Name </label>
      <input type="text" id="name" name="name" value="<?= $_SESSION['signup_name'] ?>" placeholder="What's your name?">
      <div class="error"><?= $_SESSION['bad_signup_name'] ?></div>


      <label for="email">Email </label>
      <input type="text" id="email" name="email" value="<?= $_SESSION['signup_email'] ?>" placeholder="What's your email?">
      <div class="error"><?= $_SESSION['bad_signup_email'] ?></div>

      <label for="phone">Phone Number </label>
      <input type="text" id="phone" name="phone" value="<?= $_SESSION['signup_phone'] ?>" placeholder="What's your phone number?">
      <div class="error"><?= $_SESSION['bad_signup_phone'] ?></div>

      <label for="password">Password </label>
      <input type="text" id="password" name="password" placeholder="Pick a secret passcode..">
      <div class="error"><?= $_SESSION['bad_signup_password'] ?></div>

      <button name="submit" type="submit" id="signUpSubmit"  data-submit="...Signing up">Sign Up!</button>

      <div class="success"><?= $_SESSION['signup_success'] ?></div>
    </form>
</div>


  <div class="loginHeader">
    <h3>...or Login</h3>
  </div>

  <div class="log_forms">
    <form action="form_processors/login_handler.php" method="post">

      <label for="email">Email </label>
      <input type="text" id="email" name="email" value="<?= $_SESSION['login_email'] ?>" placeholder="What's your email?">
      <div class="error"><?= $_SESSION['bad_login_email'] ?></div>

      <label for="password">Password </label>
      <input type="text" id="password" name="password" placeholder="What's your password?">
      <div class="error"><?= $_SESSION['bad_login_password'] ?></div>
      <div class="error"><?= $_SESSION['bad_combo'] ?></div>

      <button name="submit" type="submit" id="contactSubmit"  data-submit="...Logging in">Login</button>

      <div class="success"><?= $_SESSION['login_success'] ?></div>

    </form>
  </div>

</body>
<?php
  require_once "footer.php";
?>
