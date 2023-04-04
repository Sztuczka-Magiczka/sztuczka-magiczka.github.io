<?php

/* SETTINGS */
$recipient = "your.email@gmail.com";
$subject = "Masz nową wiadomość od użytkownika strony Sztuczka-Magiczka";

if($_POST){

  /* DATA FROM HTML FORM */
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
//$phone = $_POST['phone'];


  /* SUBJECT */
  $emailSubject = $subject . " by " . $name;

  /* HEADERS */
  $headers = "Nadawca: $name <$email>\r\n" .
             "Odpowiedz do: $name <$email>\r\n" . 
             "Temat: $emailSubject\r\n" .
             "Content-type: text/plain; charset=UTF-8\r\n" .
             "MIME-Version: 1.0\r\n" . 
             "X-Mailer: PHP/" . phpversion() . "\r\n";
 
  /* PREVENT EMAIL INJECTION */
  if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500 Internal Server Error");
  }

  /* MESSAGE TEMPLATE */
  $mailBody = "Imię: $name \n\r" .
              "Email:  $email \n\r" .
              "Temat:  $subject \n\r" .
//            "Phone:  $phone \n\r" .
              "Wiadomość: $message";

  /* SEND EMAIL */
  mail($recipient, $emailSubject, $mailBody, $headers);
}
?>