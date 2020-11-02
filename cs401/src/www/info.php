<?php
session_start();

//These display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Db_accessor.php';
$db_accessor = new Db_accessor();

$email = "adam@hero.com";
$user = $db_accessor->getUser($email);

$users = $db_accessor->getUsers();

//echo print_r($user['email']);

//echo $user;

foreach ($user as $item){
  echo print_r($item['name']);
}
/*
foreach ($user as $ser){
  echo print_r($ser, 1);
}


//TODO I want to be able to getUser and print result;





/*
<?php
  session_start();
  //These display errors
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);


  require_once '../Db_accessor.php';
  require_once '../user.php';
  $db_accessor = new Db_accessor();

  //define variables and set to empty values
  $_SESSION['bad_login_email'] = $_SESSION['bad_login_password'] = $_SESSION['bad_combo'] = "";
  $_SESSION['login_success'] = "";
  $_SESSION['login_email'] = $_SESSION['login_password'] = "";


  $valid_password = $valid_email = false;
  $users = $valid_user = "";

  //form is submitted with POST method
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty ($_POST["email"])){
      $_SESSION['bad_login_email'] = "*Please enter your email";
    }
    else {
      $_SESSION['login_email'] = sanitizeInput($_POST["email"]);
      //check if email address is well formed
      if (!filter_var($_SESSION['login_email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['bad_login_email'] = "*Please enter a valid email";
      }

      //check that email exists in database
      if ($_SESSION['bad_login_email'] == ""){
        $users = $db_accessor->getUsers();
        foreach ($users as $user){
          if($user['email'] == $_SESSION['login_email']){
            $valid_email = true;
            $valid_user = $user;
            break;
          }
        }
        if (!($valid_email)){
          $_SESSION['bad_combo'] = "*Incorrect email or password";
        }
      }
    }

    if (empty ($_POST["password"])){
      $_SESSION['bad_login_password'] = "*Please enter a password";
    }
    else {
      $_SESSION['login_password'] = sanitizeInput($_POST["password"]);
      //check if password is well formed
      if (!(preg_match("/^[ -~]{7,20}$/", $_SESSION['login_password']))){
        $_SESSION['bad_login_password'] = "*Please enter a valid password between 7 and 20 characters";
      }
      //check if password in db
      if ($valid_user['password'] != $_SESSION['login_password']) {
        $_SESSION['bad_combo'] = "*Not a valid email or password";
      }
    }

    if ($_SESSION['bad_login_email'] == "" and $_SESSION['bad_login_password'] == "" and $_SESSION['bad_combo'] == ""){
      unset($_POST['submit']);
      $_SESSION['authenticated'] = true;
      $_SESSION['login_success'] = "Hey there, Great to see you again!";
      $_SESSION['login_email'] = $_SESSION['login_password'] = $valid_password = $valid_email = "";
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
