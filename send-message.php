<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "clicknetworkitsolutions@gmail.com";

    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $body = "You have received a new message from the contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('✅ Message sent successfully.'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('❌ Message failed to send.'); window.location.href='contact.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='contact.html';</script>";
}
?>
