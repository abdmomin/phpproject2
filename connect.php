<?php

  $subject = "";
  $announce = "";
  $id = 0;
  $edit_state = false;

  $con = mysqli_connect('localhost', 'root', '', 'announce');

  if (isset($_POST['button'])) {
      $subject = $_POST['ansubject'];
      $announce = $_POST['announ'];

      $que = "INSERT INTO announcement (subject, announces) VALUES ('$subject', '$announce')";
      mysqli_query($con, $que);
      header('location: index.php');
  }

  if (isset($_POST['update'])) {
    $subject = $_POST['ansubject'];
    $announce = $_POST['announ'];
    $id = $_POST['id'];
    $que = "UPDATE announcement SET subject = '$subject', announces = '$announce' WHERE id = $id";
    mysqli_query($con, $que);
    header('location: index.php');
  }

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $que = "DELETE FROM announcement WHERE id = $id";
    mysqli_query($con, $que);
    header('location: index.php');
  }

  $result = mysqli_query($con, "SELECT * FROM announcement");

?>
