<?php
// $name = $_POST['name'];
// $visitor_email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['Message'];

// $email_from ='subhashkhichar766507@gmail.com';
// $email_subject ='New Form Submission';
// $email_body ="User Name: $name.\n".
//               "User Email: $visitor_email.\n".
//               "subject: $visitor_email.\n".
//               "User Message: $message .\n".

// $to = 'subhashkhichar766507@gmail.com';
// $header = "From: $email_from \r\n";
// $headers = "Reply-To: $visitor_email \r\n";

// mail($to, $email_from, $email_subject,$email_body,$header,$headers);
// echo $name;
// header("Location:Contact.html");
?>

<?php
// Include PHPMailer library files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['Message'];

    // Create an instance of PHPMailer
    $mail = new PHPMailer();

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'subhashkhichar766507@gmail.com';               // SMTP username
        $mail->Password   = 'cnvvutstjgqnizjz';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS for SSL
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);                              // Sender email
        $mail->addAddress('subhashkhichar766507@gmail.com');                 // Add recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h3>Contact Form Submission</h3>
                          <p><b>Name:</b> $name</p>
                          <p><b>Email:</b> $email</p>
                          <p><b>Message:</b> $message</p>";

        // Send email
        if ($mail->send()) {
echo "sucess";
        } else {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. PHPMailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request';
}
?>
