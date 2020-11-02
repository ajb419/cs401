<?php
  session_start();
  require_once '../Db_accessor.php';

  //These display errors
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  //define variables and set to empty values
  $_SESSION['bad_name'] = $_SESSION['bad_phone'] = $_SESSION['bad_email'] = "";
  $_SESSION['success'] = "";
  $_SESSION['name'] = $_SESSION['phone'] = $_SESSION['email'] = $_SESSION['description'] = "";
  //form is submitted with POST method
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty ($_POST["description"])){
      $_SESSION['description'] = "";
    }
    else {
    	$_SESSION['description'] = sanitizeInput($_POST["description"]);
    }


    if (empty ($_POST["name"])){
      $_SESSION['bad_name'] = "*Please enter your name";
    }
    else {
      $_SESSION['name'] = sanitizeInput($_POST["name"]);
      //check if name only contains letters and whitespace
      if (ctype_alpha(str_replace(' ', '', $_SESSION['name'])) === false){
        $_SESSION['bad_name'] = "*Please enter a valid name using only letters and whitespace";
      }
    }


    if (empty ($_POST["phone"])){
      $_SESSION['bad_phone'] = "*Please enter your phone number";
    }
    else {
      $_SESSION['phone'] = sanitizeInput($_POST["phone"]);
      //check if phone number is well formed
      if (!(preg_match("/^[0-9]{10}$/", $_SESSION['phone']))){
        $_SESSION['bad_phone'] = "*Please enter a valid phone number using only numbers, no spaces or dashes";
      }
    }


    if (empty ($_POST["email"])){
      $_SESSION['bad_email'] = "*Please enter your email";
    }
    else {
      $_SESSION['email'] = sanitizeInput($_POST["email"]);
      //check if email address is well formed
      if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['bad_email'] = "*Please enter a valid email";
      }
    }


    if ($_SESSION['bad_name'] == "" and $_SESSION['bad_email'] == "" and $_SESSION['bad_phone'] == ""){
      $messageBody = "";
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
        $messageBody .= "$key: $value\n";
      }
      $db_accessor = new Db_accessor();
      $db_accessor->addContactOnlyUser($_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['description']);

      $_SESSION['success'] = "Thank you for contacting me!";
      $_SESSION['name'] = $_SESSION['phone'] = $_SESSION['email'] = $_SESSION['description'] = "";
/*
      $to = "seasonalimprovement@gmail.com";
      $subject = "Contact form submit";
      if (mail($to, $subject, $messageBody)){
      }
*/
    }
  }

  //sanitize POST data
  function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // redirect back to the comments page
  header("Location: ../contact.php");
  exit();

?>
