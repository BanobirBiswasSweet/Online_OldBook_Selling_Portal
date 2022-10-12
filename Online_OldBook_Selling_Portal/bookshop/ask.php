<?php
require "./functions/database_functions.php";
$conn = db_connect();
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);

$text = mysqli_real_escape_string($conn,$_POST['text']);

$sql = "INSERT INTO ask VALUES
  ('" . $name . "', '" . $email . "', '" . $text. "')";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "insert false !" . mysqli_error($conn);
    exit;
  }
header("location: index.php");

?>
