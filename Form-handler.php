<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['Message'];

$email_from ='subhashkhichar766507@gmail.com';
$email_subject ='New Form Submission';
$email_body ="User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "subject: $visitor_email.\n".
              "User Message: $visitor .\n".

$to = 'subhashkhichar766507@gmail.com';
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

mail($to, $email_subject,,$email_body,$headers);
header("Location: Contact.html");
?>