<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoload
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Retrieve the arrays of products and quantities
$products = $_POST['product'];
$quantities = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$additional_info = $_POST['Add-info'];

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'sapphires451@gmail.com'; // SMTP username
    $mail->Password = 'pqqwicahnhkehmbe'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable implicit TLS encryption
    $mail->Port = 587; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('sapphires451@gmail.com', 'TEBC');
    $mail->addAddress('devtech562@gmail.com', 'Tech-Support'); // Add a recipient
    $mail->addAddress('swiftXchange3@gmail.com', 'Swift-X technology'); // Add a recipient
    // $mail->addReplyTo('devtech562@gmail.com', 'Tech-Support');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'NEW CUSTOMER ORDER';

    // Construct the email body by looping through the products and quantities arrays
    $emailBody = 'SENDER NAME: <b>' . $name . '</b><br> SENDERS EMAIL: ' . $email . '<br>';

    // Loop through the products and quantities
    for ($i = 0; $i < count($products); $i++) {
        $product = $products[$i];
        $quantity = $quantities[$i];

        // Add each product and quantity to the email body
        $emailBody .= 'PRODUCT-ORDERED: ' . $product . '<br>QUANTITY: ' . $quantity . '<br>';
    }

    // Add delivery address and additional info to the email body
    $emailBody .= 'DELIVERY-ADDRESS: ' . $address . '<br>ADDITIONAL_MESSAGE: ' . $additional_info;

    // Set the email body
    $mail->Body = $emailBody;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Location: thank-you.php?mailsend");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
