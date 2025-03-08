<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "), $name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Παρακαλώ συμπληρώστε σωστά τη φόρμα και προσπαθήστε ξανά.";
        exit;
    }

    $recipient = "developmentpanos@gmail.com"; // Αντικατάστησε με το email σου
    $subject = "Νέο μήνυμα από τη φόρμα επικοινωνίας";
    $email_content = "Όνομα: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Μήνυμα:\n$message\n";
    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "Ευχαριστούμε! Το μήνυμά σας εστάλη.";
    } else {
        http_response_code(500);
        echo "Κάτι πήγε στραβά, δοκιμάστε ξανά.";
    }

} else {
    http_response_code(403);
    echo "Υπήρξε ένα πρόβλημα με την υποβολή σας, δοκιμάστε ξανά.";
}
?>
