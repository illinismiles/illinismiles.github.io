<?php

  //var declarations
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $formcontent="From: $name \n Message: $message";
  $recipient = "illinismiles@gmail.com";
  $subject = "Illini Smiles Contact Form";
  $mailheader = "From: $email \r\n";

  //checks if the post has been submitted
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // checks if there is data for every field input
    if (empty($name) || empty($email) || empty($message)) {
      echo "<script type='text/javascript'>alert('All fields are required.');</script>";
    }
    // if it gets through then makes the
    else {
      test_input($email);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Invalid email.');</script>";
      }
      else {
        mail($recipient, $subject, $formcontent, $mailheader) or die("<script type='text/javascript'>alert('Error!');</script>");

        echo "<script type='text/javascript'>alert('Thank you! We will respond in a timely manner.');</script>";
      }
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

