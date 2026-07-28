<?php

    $to = "exodusbnyame@gmail.com";
    $email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
    $first_name = isset($_REQUEST['first_name']) ? trim($_REQUEST['first_name']) : '';
    $last_name = isset($_REQUEST['last_name']) ? trim($_REQUEST['last_name']) : '';
    $name = isset($_REQUEST['name']) ? trim($_REQUEST['name']) : '';
    $subject = isset($_REQUEST['subject']) ? trim($_REQUEST['subject']) : '';
    $number = isset($_REQUEST['number']) ? trim($_REQUEST['number']) : '';
    $message = isset($_REQUEST['message']) ? trim($_REQUEST['message']) : '';

    $full_name = trim($first_name . ' ' . $last_name);
    if ($full_name === '') {
        $full_name = $name !== '' ? $name : 'Website visitor';
    }

    if ($subject === '') {
        $subject = 'Class signup inquiry';
    }

    $headers = "From: " . $email . "\r\n";
	$headers .= "Reply-To: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $mail_subject = "New message from Ston Fitness website";

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Ston Fitness Contact</title></head><body style='font-family: Arial, sans-serif; color: #1a1a1a;'>";
	$body .= "<table style='width: 100%; border-collapse: collapse;'>";
	$body .= "<tbody>";
	$body .= "<tr><td style='padding:8px 0;'><strong>Name:</strong> " . htmlspecialchars($full_name, ENT_QUOTES, 'UTF-8') . "</td></tr>";
	$body .= "<tr><td style='padding:8px 0;'><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</td></tr>";
	$body .= "<tr><td style='padding:8px 0;'><strong>Phone:</strong> " . htmlspecialchars($number, ENT_QUOTES, 'UTF-8') . "</td></tr>";
	$body .= "<tr><td style='padding:8px 0;'><strong>Subject:</strong> " . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . "</td></tr>";
	$body .= "<tr><td style='padding:8px 0;'><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</td></tr>";
	$body .= "</tbody></table></body></html>";

	$send = mail($to, $mail_subject, $body, $headers);

	if ($send) {
		echo 'success';
	} else {
		http_response_code(500);
		echo 'error';
	}

?>