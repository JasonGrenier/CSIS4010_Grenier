<?php
// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Replace 'contact@example.com' with the email address where you want to receive the form submissions
$receiving_email_address = 'grenier.software@gmail.com';

// Set email headers
$headers = "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8" . "\r\n";

// Construct the email message
$email_message = "Name: $name\n";
$email_message .= "Email: $email\n";
$email_message .= "Subject: $subject\n\n";
$email_message .= "Message:\n$message";

// Send email using PHP's mail() function
if (mail($receiving_email_address, $subject, $email_message, $headers)) {
    echo "Email sent successfully";
} else {
    echo "Failed to send email";
}
?>
