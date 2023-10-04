<?php
 $name = $_POST["name"];
 $email = $_POST["email"];
 $message = $_POST["message"];


$to = "chukwurahenry@gamil.com";
$subject = "contact-form-message";
$txt = "this message " . $name . $email . "\n". $message;
$headers = "From: swiftXchange3@gmail.com" . "\r\n" .
"CC: christoguns234@gmail.com";


mail($to,$subject,$txt,$headers);
?>