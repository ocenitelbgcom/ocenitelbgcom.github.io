<?php

    // Get/sanitize form fields
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $phone = filter_var(trim($_POST["phone"]), FILTER_SANITIZE_EMAIL);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $ownership = filter_var(trim($_POST["ownership"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Validation
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.ocenitelbg.com/index.php?success=-1#form");
        exit;
    }

    // Prepare mail

    $recipient = "jivkokweb@live.com"; // "varban.kolev@ocenitelbg.com";

    $subject = "ocenitelbg.com - new message from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Ownership: $ownership\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://www.ocenitelbg.com/index.php?success=1#form");

?>
