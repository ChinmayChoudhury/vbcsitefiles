<?php
	$name = $_POST['name'];
	$senderEmail = $_POST['email'];
	$subject = "Feedback | ".$_POST['subject'];
	$message = $_POST['message'];
	date_default_timezone_set('Etc/UTC');
	require_once 'PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail -> isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = localhost;
	$mail->SMTPAuth = false;
	$mail->Username = "no-reply@vbcvit.com";
	$mail->Password = "no-replyVbcVit";
	$mail->setFrom('no-reply@vbcvit.com', 'Visual Bloggers\' Club');
	$mail->addReplyTo('no-reply@vbcvit.com', 'Visual Bloggers\' Club');
	$mail->addAddress('vbcvit@gmail.com', '');
	$mail->Subject = 'Feedback from viewer | Contact Page';
	$mail->isHTML(true);
	
	$messagebody = "
			<h3>Feedback</h3>
			<p>From: $name</p>
			<p>Email: $senderEmail</p>
			<p>Message</p>
			<p>$message</p>
		";
	$mail->SMTPOptions = array(
            		'ssl' => array(
                	'verify_peer' => false,
                	'verify_peer_name' => false,
                	'allow_self_signed' => true
            	)
        	);	
	if ($mail->Send()) {
		$_SESSION['success'] = "Thanks for contacting us. We will get back to you shortly."
		header("Location: contactv2.php"); return;
	}
	else{
		$_SESSION['error'] = "Some unexpected error occured. Sorry for inconvenience. You can write to us at vbcvit@gmail.com";
		header("Location: contactv2.php"); return;
	}
?>