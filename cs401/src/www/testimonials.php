<?php
  $pagename = "Testimonials";
  require_once "header.php";
  require_once 'Db_accessor.php';
?>

<body>
  <div class="site_redirection">
    <p><a href= "login.php"> Sign up or Login</a>
       to let us know how we did!</p>
  </div>

  <div id="testHeader">
    <h2>So, how did we do?</h2>
  </div>

  <div class="forms">
    <form action="form_processors/testi_handler.php" method="post">
      <textarea type="text" id="comment" name="comment" placeholder="You can let us know here..."><?php if(isset($_POST['submit'])) { echo htmlentities ($_POST['comment']);} echo $_SESSION['comment']?></textarea>
      <button name="submit" type="submit" id="contactSubmit"  data-submit="...Sending">Submit</button>
      <div class="error"><?= $_SESSION['no_session'] ?></div>
    </form>
  </div>

  <hr>

  <div id="comments_display">
    <?php
      $db_accessor = new Db_accessor();
      $comments = $db_accessor->getComments();
      foreach($comments as $comment){
        echo "<div id='comment_box'>";
        echo "<span>" . $comment['comment_date'] . "<span>";
        echo "<div id='testimonial'>" . $comment['comment'] . "</div>";
        echo "</div>";
        echo "<hr>";
      }
    ?>
  </div>
</body>
<?php
  require_once "footer.php";
?>
