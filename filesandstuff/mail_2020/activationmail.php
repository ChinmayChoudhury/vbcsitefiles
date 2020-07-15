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
	$mail->Subject = 'Activate your account | VBC-VIT';
	$mail->isHTML(true);
	
	$messagebody = "
			<h3>Activate your account</h3>
			<p>Click on the following link to activate your account</p>
			".'<a href ="http://vbcvit.com/activateaccountv2.php?token='.$passhash.'">Clik here to activate<a/>
			'."<p>or go to: http://vbcvit.com/activateaccountv2.php?token=".$passhash."</p><p>If any problem occurs contact technical team at VBC</p>" ;
	$mail->SMTPOptions = array(
            		'ssl' => array(
                	'verify_peer' => false,
                	'verify_peer_name' => false,
                	'allow_self_signed' => true
            	)
        	);	
	if ($mail->Send()) {
		$_SESSION['success'] .= "An email with activation link has been sent successfully."
		header("Location: signinv2.php"); return;
	}
	else{
		$_SESSION['error'] = "Some unexpected error occured. Please contact technical team.";
		header("Location: registerv2.php"); return;
	}
?>