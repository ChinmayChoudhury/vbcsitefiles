<?php 
	session_start();
	if (!isset($_GET['token'])) {
		header("Location: errorv2.php?code=20003"); return;
	}

	if (isset($_GET['token'])) {
		if (strlen($_GET['token'])<1) {
			header("Location: errorv2.php?code=20003"); return;
		}
		else{
			$flag = false;
			if (isset($_POST['submit'])) {
				if (strlen($_POST['password'])<1 || strlen($_POST['repassword'])<1) {
					$_SESSION['error'] = "All fields are neccessary";
					header("Location: resetpasswordv2.php?token=".urlencode($_GET['token'])); return;
				}
				$alpha = preg_match("/[a-zA-z]{1,}/", $_POST['password']);
		        $num = preg_match("/[0-9]{1,}/", $_POST['password']);
				if (!$alpha || !$num || strlen($_POST['password'])<8) {
            		$_SESSION['passErr'] = "<p>Password doesn't meet requirements</p>"; 
            		$flag = true;
        		}
        		if ($_POST['password'] != $_POST['repassword']) {
            		$_SESSION['unmatchedErr'] = "<p>Passwords doesn't match</p>"; 
            		$flag = true;
        		}
        		//if data not valid
        		if($flag){
        			header("Location: resetpasswordv2.php?token=".urlencode($_GET['token'])); return;
        		}
        		else{
        			require_once './DB_2020/pdo.php';
        			$stmt = $pdo->prepare("SELECT usern from user WHERE token = :tokenvar");
        			$stmt->execute(array("tokenvar"=>$_GET['token']));
        			$row = $stmt->fetch(PDO::FETCH_ASSOC);
        			if ($row) {
        				$passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        				$stmt = $pdo->prepare("UPDATE user SET passwd = :passvar WHERE token = :tokvar");
        				$stmt->execute(array(
        					"passvar"=> $passhash,
        					"tokvar"=> $_GET['token']
        				));
        				$_SESSION['success'] = "Your password has been reset";
        				header("Location: signinv2.php"); return;
        			}
        			else{
        				header("Location: errorv2.php?code=20004"); return;
        			}
        		}
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img_2020/logo.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css_2020/forgotpass.css">
    <link rel="stylesheet" type="text/css" href="css_2020/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Forgot Password</title>
	
</head>
<body>
    <div class="container" id="form1">
        <!-- <h1><?php// echo $err; ?></h1> -->
        <div class="row row-content">
            <div class="col-12 text-center mb-3">
                <h3>Password Reset</h3>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo '<p style="color: red">', $_SESSION['error'],"</p>";
                        unset($_SESSION['error']);
                    }
                ?>    
            </div>
            
            <div class="col-12 offset-md-1 col-md-8">
            	Password must be longer than 8 character and should contain at least one alphabet and one number.<br>
                <form method="post" id="forgotForm">
                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-lg-right text-md-center">New password:</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control pill" id="password" name="password" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repassword" class="col-md-6 col-form-label text-lg-right text-md-center">Retype new password:</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control pill" id="repassword" name="repassword" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 text-center mt-3">                
                <button type="submit" form="forgotForm" name="submit" value="submit" class="btn pill text-white black-bg">
                    &nbsp;Submit&nbsp;
                </button>
            </div>
            <br>
        </div>
    </div>

</body>


</html>