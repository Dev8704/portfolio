<?php
  header("Access-Control-Allow-Origin: *"); // for CORS if needed
  header("Content-Type: application/json");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $name    = htmlspecialchars($_POST['name']);
      $email   = htmlspecialchars($_POST['email']);
      $subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);

      $to      = "yadvbablu381@gmail.com";
      $headers = "From: $name <$email>\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

      $body  = "New Contact Form Message:\n\n";
      $body .= "Name: $name\n";
      $body .= "Email: $email\n";
      $body .= "Subject: $subject\n";
      $body .= "Message:\n$message\n";

      if (mail($to, $subject, $body, $headers)) {
          echo json_encode(["status" => "success", "message" => "Message sent successfully."]);
      } else {
          echo json_encode(["status" => "error", "message" => "Failed to send message."]);
      }
  } else {
      echo json_encode(["status" => "error", "message" => "Invalid request method."]);
  }
?>
