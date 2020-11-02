<?php
session_start();

//These display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User {

  private $userName;
  private $userId;
  private $email;
  private $phone;
  private $password;
  private $signupDate;

  public function __construct($userName, $userID, $email, $phone, $password, $signupDate) {
    $this->userName = $userName;
    $this->$userId = $userId;
    $this->$email = $email;
    $this->$phone = $phone;
    $this->$password = $password;
    $this->$signupDate = $signupDate;
  }

  public function getUserName () {
    return $userName;
  }

  public function getUserId () {
    return $userId;
  }

  public function getEmail () {
    return $email;
  }

  public function getPassword () {
    return $password;
  }

  public function getPhone () {
    return $phone;
  }

  public function getSignupDate () {
    return $signupDate;
  }
}
