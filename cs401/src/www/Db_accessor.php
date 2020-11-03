<?php
session_start();

class Db_accessor {

  public function getConnection () {
    try {
    //  mysql://b042ba57e36170:18da13f8@us-cdbr-east-02.cleardb.com/heroku_f5ad45fc81a0fa3?reconnect=true
      //$conn = new PDO("mysql:host=localhost;dbname=cs401_db;port=8889", "root", "root");
      $conn = new PDO("mysql:host=us-cdbr-east-02.cleardb.com;dbname=heroku_f5ad45fc81a0fa3;", "b042ba57e36170", "18da13f8");
      return $conn;
    }
    catch (Exception $e) {
      echo print_r($e,1);
    }
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("select comment_id, comment_date, comment from comments order by comment_date desc", PDO::FETCH_ASSOC);
  }

  public function addComment ($comment, $user_id) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comments (user_id, comment) values (:user_id, :comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":user_id", $user_id);
    $q->execute();
  }

  public function deleteComment ($comment_id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comments where comment_id = :comment_id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":comment_id", $comment_id);
    $q->execute();
  }

  public function addUser ($name, $email, $phone, $password) {
    $conn = $this->getConnection();
    $saveQuery = "insert into users (name, email, phone, password) values (:name, :email, :phone, :password)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":email", $email);
    $q->bindParam(":phone", $phone);
    $q->bindParam(":password", $password);
    $q->execute();
  }

  public function addContactOnlyUser ($name, $email, $phone, $project_description) {
    $conn = $this->getConnection();
    $saveQuery = "insert into contactOnlyUsers (name, email, phone, project_description) values (:name, :email, :phone, :description)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":email", $email);
    $q->bindParam(":phone", $phone);
    $q->bindParam(":description", $project_description);
    $q->execute();
  }

  public function getUsers() {
    $conn = $this->getConnection();
    return $conn->query("select name, id, email, phone, password, signup_date from users order by signup_date desc", PDO::FETCH_ASSOC);
  }

  public function getUser($email) {
    $conn = $this->getConnection();
    $user =  $conn->query("select * from users where email = :email");
    $q = $conn->prepare($user);
    $q->bindParam(":email", $email);
    $q->execute();
    return $q->fetch(PDO::FETCH_ASSOC);
  }

  public function getContactOnlyUsers() {
    $conn = $this->getConnection();
    return $conn->query("select name, email, phone, project_description, contact_date from contactOnlyUsers order by contact_date desc", PDO::FETCH_ASSOC);
  }
}
