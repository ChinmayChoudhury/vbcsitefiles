<?php

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
	$mail->addAddress($_POST['email'], '');
	$mail->Subject = 'Reset your password | VBC-VIT';
	$mail->isHTML(true);
	
	$messagebody = "
			<h3>Reset your password</h3>
			<p>Click on the following link to reset your password</p>
			".'<a href ="http://vbcvit.com/resetpasswordv2.php?token='.$row['token'].'">Clik here to reset your password<a/>
			'."<p>Or go to: http://vbcvit.com/activateaccountv2.php?token=".$row['token']."</p><p>If any problem occurs contact technical team at VBC</p>" ;
	$mail->SMTPOptions = array(
            		'ssl' => array(
                	'verify_peer' => false,
                	'verify_peer_name' => false,
                	'allow_self_signed' => true
            	)
        	);	
	if ($mail->Send()) {
		$_SESSION['success'] .= "An email with a reset link has been sent successfully.";
		header("Location: forgotpasswordv2.php"); return;
	}
	else{
		$_SESSION['error'] = "Some unexpected error occured. Please contact technical team.";
		header("Location: forgotpasswordv2.php"); return;
	}

?>