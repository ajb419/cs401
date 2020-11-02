<?php
  session_start();

  //These display errors
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once '../Db_accessor.php';
  require_once '../User.php';

  $db_accessor = new Db_accessor();

  //define variables and set to empty values
  $_SESSION['bad_signup_name'] = $_SESSION['bad_signup_email'] = $_SESSION['bad_signup_password'] = $_SESSION['bad_signup_phone'] = "";
  $_SESSION['signup_success'] = "";
  $_SESSION['signup_name'] = $_SESSION['signup_email'] = $_SESSION['signup_password'] = $_SESSION['signup_phone'] = "";
  $email_exists = false;

  //form is submitted with POST method
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty ($_POST["name"])){
      $_SESSION['bad_signup_name'] = "*Please enter your name";
    }
    else {
      $_SESSION['signup_name'] = sanitizeInput($_POST["name"]);
      //check if name only contains letters and whitespace
      if (ctype_alpha(str_replace(' ', '', $_SESSION['signup_name'])) === false){
        $_SESSION['bad_signup_name'] = "*Please enter a valid name using only letters and whitespace";
      }
    }

    if (empty ($_POST["email"])){
      $_SESSION['bad_signup_email'] = "*Please enter your email";
    }
    else {
      $_SESSION['signup_email'] = sanitizeInput($_POST["email"]);
      //check if email address is well formed
      if (!filter_var($_SESSION['signup_email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['bad_signup_email'] = "*Please enter a valid email";
      }
      //check if email already in db
      $users = $db_accessor->getUsers();
      foreach ($users as $user){
        if($user['email'] == $_SESSION['signup_email']){
          $email_exists = true;
          break;
        }
      }
      if ($email_exists){
        $_SESSION['bad_signup_email'] = "*There is already an account in use with that email";
      }
    }


    if (empty ($_POST["password"])){
      $_SESSION['bad_signup_password'] = "*Please enter a password";
    }
    else {
      $_SESSION['signup_password'] = sanitizeInput($_POST["password"]);
      //check if password is well formed
      if (!(preg_match("/^[ -~]{7,20}$/", $_SESSION['signup_password']))){
        $_SESSION['bad_signup_password'] = "*Please enter a valid password between 7 and 20 characters";
      }
    }

    if (empty ($_POST["phone"])){
      $_SESSION['bad_signup_phone'] = "*Please enter your phone number";
    }
    else {
      $_SESSION['signup_phone'] = sanitizeInput($_POST["phone"]);
      //check if phone number is well formed
      if (!(preg_match("/^[0-9]{10}$/", $_SESSION['signup_phone']))){
        $_SESSION['bad_signup_phone'] = "*Please enter a valid phone number using only numbers, no spaces or dashes";
      }
    }

    if ( $_SESSION['bad_signup_name'] == "" and $_SESSION['bad_signup_email'] == "" and $_SESSION['bad_signup_password'] == "" and $_SESSION['bad_signup_phone'] == ""){
      // add email and password to database
      $db_accessor->addUser($_SESSION['signup_name'], $_SESSION['signup_email'], $_SESSION['signup_phone'], $_SESSION['signup_password']);
      //get the newly added user, newest user is first in list since getUsers() returns users by signup_date
      $users = $db_accessor->getUsers();
      foreach ($users as $user){
        if($user['email'] == $_SESSION['signup_email']){
          $_SESSION['user'] = new User($user['name'], $next['id'], $next['email'], $next['phone'], $next['password'], $next['signup_date']);
          break;
        }
      }
      unset($_POST['submit']);
      $_SESSION['authenticated'] = true;
      $_SESSION['signup_success'] = "Welcome to the group friend!";
      $_SESSION['signup_name'] = $_SESSION['signup_email'] = $_SESSION['signup_password'] = $_SESSION['signup_phone'] = "";
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
  header("Location: ../login.php");
  exit();

?>
