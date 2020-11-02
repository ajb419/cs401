<?php
  session_start();

  require_once '../Db_accessor.php';
  $db_accessor = new Db_accessor();

  $_SESSION['no_session'] = "";

  //form is submitted with POST method
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty ($_POST["comment"])){
      header("Location: ../testimonials.php");
      exit();
    }
    else {
      $_SESSION['comment'] = sanitizeInput($_POST["comment"]);
    }

    if ($_SESSION['authenticated'] == true){
      // add comment to db
      $id = $_SESSION['user']->getUserId;
      $db_accessor->addComment($_SESSION['comment'], $id);

      unset($_POST['submit']);
      $_SESSION['comment'] = "";
    }
    else{
      $_SESSION['no_session'] = "Please <a href= 'login.php'> Sign In</a> to leave a comment";
    }
}

  //sanitize POST data
  function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // redirect back to the login page
  header("Location: ../testimonials.php");
  exit();

?>
