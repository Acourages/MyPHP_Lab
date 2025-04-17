<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validate the data
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ?page=contact&status=error&message=Please fill out all fields correctly.");
        exit;
    }

    $to = "your-email@example.com"; // Replace with your actual email address
    $subject = "New message from your portfolio website";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: ?page=contact&status=success&message=Your message has been sent!");
    } else {
        header("Location: ?page=contact&status=error&message=There was an error sending your message. Please try again later.");
    }
    exit;
} else {
    header("Location: ?page=contact");
    exit;
}
?>