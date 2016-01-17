<?php
    // Get/sanitize form fields
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "), $name);
    $phone = trim($_POST["phone"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $ownership = trim($_POST["ownership"]);
    $message = trim($_POST["message"]);

    // Validation
    if (empty($name) OR (empty($phone) AND !filter_var($email, FILTER_VALIDATE_EMAIL))) {
        header("Location: http://www.ocenitelbg.com/index.php?success=-1#contact");
        exit;
    }

    // Prepare mail

    $recipient = "varban.kolev@ocenitelbg.com";

    $subject = "ocenitelbg.com: message from $name";

    $email_content = "Име: $name\n";
    $email_content .= "Телефон: $phone\n";
    $email_content .= "Емайл: $email\n";
    $email_content .= "Собственост: $ownership\n\n";
    $email_content .= "Съобщение:\n$message\n";

    $email_headers = filter_var($email, FILTER_VALIDATE_EMAIL) ? "From: $name <$email>" : "From: ocenitelbg.com <varban.kolev@ocenitelbg.com>";

    // Send
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index page with success code
    header("Location: http://www.ocenitelbg.com/index.php?success=1#contact");
?>
