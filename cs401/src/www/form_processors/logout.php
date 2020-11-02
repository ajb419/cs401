<?php
  session_start();
  $_SESSION['authenticated'] = '';

  header("Location: ../index.php");
  exit();
?>
