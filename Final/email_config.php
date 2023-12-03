<?php

function sendApprovalEmail($to, $bookingId) {
    $subject = "Booking Approval";
    $message = "Your booking with ID $bookingId has been approved. Thank you!";
    $headers = "From: yujanr4@gmail.com";

    mail($to, $subject, $message, $headers);
}

function sendDeclineEmail($to, $bookingId) {
    $subject = "Booking Declined";
    $message = "Your booking with ID $bookingId has been declined. Please contact us for more information.";
    $headers = "From: yujanr4@gmail.com";

    mail($to, $subject, $message, $headers);
}

function sendDeletionEmail($to) {
    $subject = "Account Deletion";
    $message = "Your account has been deleted by the admin. If you have any concerns, please contact us.";
    $headers = "From: yujanr4@gmail.com";

    mail($to, $subject, $message, $headers);
}
?>
