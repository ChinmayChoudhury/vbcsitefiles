<?php
	session_start();
	if (isset($_GET['token'])) {
		if (strlen($_GET['token'])<1) {
			$_SESSION['error'] = "no token found";
			header("index.html"); return;
		}
		else{
			require './DB_2020/pdo.php';
			$stmt = $pdo->prepare("UPDATE user SET status = 1 WHERE token = :tokenvar");
			$stmt->execute(array(':tokenvar'=> $_GET['token']));
			$_SESSION['success'] = "Your account has been successfully activated";
			header("Location: signinv2.php"); return;
		}
	}
	else{
		header("errorv2.php?code=20003"); return;
	}

?>