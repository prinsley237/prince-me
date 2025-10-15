<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $project = htmlspecialchars(trim($_POST['project']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email configuration
    $to = "sunjohprince@gmail.com";
    $email_subject = "New message from portfolio: $subject";
    $email_body = "
    You have received a new message from your portfolio website:\n\n
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Project: $project\n
    Subject: $subject\n
    Message:\n$message\n
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>