<?php 
	$name = '';
	$emailid = '';
	$ph = '';
	$message = '';
	$error = '';
	$mfoot ='';
	if(isset($_POST['submit'])){
		if(empty($_POST["name"])){
			$error .= '<p><label class = "text-danger"> Please enter your name</label></p>';
		}
		else{
			$name = htmlspecialchars(stripslashes(trim($_POST["name"])));
		}

		if(empty($_POST["telnum"])){
			$error .= '<p><label class = "text-danger"> Please enter your phone number</label></p>';
		}
		else{
			$ph = htmlspecialchars(stripslashes(trim($_POST["telnum"])));
			if(preg_match("/^[6789]{1}[0-9]{9}$/", $ph)){
				echo "correct number";
			}
		}
		if(empty($_POST["emailid"])){
			$error .= '<p><label class = "text-danger"> Please enter your email id</label></p>';
		}
		else{
			$emailid = htmlspecialchars(stripslashes(trim($_POST["emailid"])));;
			if(!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
				$error .= '<p><label class = "text-danger">Invalid email id</label></p>'; 
			}
		}

		if(isset($_POST["contactway"])){
			$way = $_POST["contactway"];
			$mfoot .= "\nI would like to be contacted via $way. \n";
		}
		else{
			$mfoot .= "\nI don't want to be contacted.";
		}

		if (isset($_POST['feedback'])) {
			$message = htmlspecialchars(stripslashes(trim($_POST['feedback'])));	
		}
		else{
			$error .= '<p><label class = "text-danger">Please give a message.</label></p>';
		}
		if ($error == '') {
			date_default_timezone_set('Etc/UTC');

			require 'PHPMailerAutoload.php';
			$mail = new PHPMailer;
			// set mailer to use SMTP
			$mail -> isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';

			// host is localhost 
			$mail->Host = localhost; 
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "no-reply@vbcvit.com";

			//Password to use for SMTP authentication
			$mail->Password = "no-replyVbcVit";

			//Set who the message is to be sent from
			$mail->setFrom('no-reply@vbcvit.com', 'Visual Bloggers\' Club');

			//Set an alternative reply-to address
			$mail->addReplyTo('no-reply@vbcvit.com', 'Visual Bloggers\' Club');

			//Set who the message is to be sent to
			$mail->addAddress('vbcvit@gmail.com', '');

			//Set the subject line
			$mail->Subject = 'Feedback from viewer | Contact Page';

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
    		//$message = file_get_contents($message);   
			$mail->Body = $message; 
	
        
        	$mail->SMTPOptions = array(
            	'ssl' => array(
                	'verify_peer' => false,
                	'verify_peer_name' => false,
                	'allow_self_signed' => true
            	)
        	);
			//Replace the plain text body with one created manually
			$mail->AltBody ="Name: ". $name."\nEmail: " .$emailid . "\nPhone Number: " . $ph. "\nMessage: " .$message."\n".$mfoot;

			//Attach an image file
			//	$mail->addAttachment('images/phpmailer_mini.png');

			if ($mail-> Send()) {
				$error = '<label class = "text-success">Mail has been sent successfuly. Thank you for contacting us.</label>';
				header("Location: contactv1.php");
			}
			else{
				$error = '<label class = "text-danger">Error occured, mail could not be sent</label>';
			}
		
		}
	}	
?>
