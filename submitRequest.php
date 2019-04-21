<?php

/*
 * Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
 */

include 'connection.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "INSERT INTO users (`name`, `dob`, `gender`, `state`, `phone`, `email`, `password`) 
  			  VALUES('$name', '$dob', '$gender', '$state', '$phone','$email','$password')";
    echo 'success 1';
    mysqli_query($db, $query);

    echo 'success 2';
}














/*
  $con = new PDO ("mysql:host=localhost;dbname=med_rec_dir","root","");

  if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $insert = $con->prepare("INSERT INTO users (name, dob, gender, city, state, country, address, phone, email, password, verification_status) "
  . "VALUES (:name, :dob, :gender, :city, :state, :country, :address, :phone, :email, :password, PENDING)");

  $insert->bindParam(':name', $name);
  $insert->bindParam(':dob', $dob);
  $insert->bindParam(':gender', $gender);
  $insert->bindParam(':city', $city);
  $insert->bindParam(':state', $state);
  $insert->bindParam(':country', $country);
  $insert->bindParam(':address', $address);
  $insert->bindParam(':phone', $phone);
  $insert->bindParam(':email', $email);
  $insert->bindParam(':password', $password);

  $insert->execute();

  echo 'Successfull';
  echo '<a href="register.php">Back</a>';
  }
 */

//error_reporting(error_reporting() & ~E_NOTICE);
/*
  $sql = "INSERT INTO user_reg_req (name, dob, gender, city, state, country, residence, phone, email, password, verification_status) VALUES ('". $_POST['name'] . "','" . $_POST['dob'] . "','" . $_POST['gender'] ."','" . $_POST['city'] . "','" . $_POST['state'] . "','" . $_POST['country'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['password'] ."','PENDING')";
  $pdo->exec($sql);

  echo 'Successfull';
  echo '<a href="register.php">Back</a>';


  $sql = "INSERT INTO user_reg_req (name, dob, gender, city, state, country, residence,phone, email,password, verification_status) VALUES "
  . "('".$_POST['name']."', '".$_POST['dob']."', '".$_POST['gender']."', '".$_POST['city']."', '".$_POST['state']."',"
  . " '".$_POST['country']."', '".$_POST['residence']."'"
  . ",'".$_POST['phone']."','".$_POST['email']."' ,'".$_POST['password']."', 'PENDING' )" ;
  $pdo->exec($sql);

 */ /*

  <?php
  $conn = new mysqli('localhost', 'root', '', 'med_rec_dir');

  $insert = $conn->prepare("INSERT INTO users (name, dob, gender, city, state, country, address, phone, email, password, verification_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, PENDING)");

  $insert->bind_param('ssssssssss', $_POST['name'], $_POST['dob'], $_POST['gender'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['password']);

  $insert->execute();

  echo 'Successfull';
  echo '<a href="register.php">Back</a>'; */
?>