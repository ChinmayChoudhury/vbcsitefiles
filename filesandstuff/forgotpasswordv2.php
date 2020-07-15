<?php 
	session_start();
	// find the email and if found ask for a new password
    // if already logged in take 'em to error page :)
	if (isset($_SESSION['user'])) {
		header("Location: errorv2.php?code=20003"); return;
	}
    require_once './DB_2020/pdo.php';
    //when form submits
    if (isset($_POST['submit'])) {
        // fields not filled 
        if (strlen($_POST['email'])<1) {
            $_SESSION['error'] = "Please provide an email";
            header("Location: forgotpasswordv2.php"); return;
        }
        // validate email
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email"; 
            header("Location: forgotpasswordv2.php"); return;
        }
        // data is valid, search for email
        $stmt = $pdo->prepare("SELECT email, token from user WHERE email = :emailvar");
        $stmt->execute(array(":emailvar"=>$_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            //email is found so send an email

            require_once './mail_2020/forgotpasswordmailv2.php';

        
            // $_SESSION['success'] = "A link to change your password has been send to your email.$row['email']";
            // header("Location: forgotpasswordv2.php"); return;
        }
        else{
            $_SESSION['error'] = "Email is not found. Provide the email you signed up with";
            header("Location: forgotpasswordv2.php"); return;
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
	<!-- include header -->
	<?php include_once 'headerv2.php'; ?>

	<!-- form for forgot Password -->
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
                    if (isset($_SESSION['success'])) {
                        echo '<p style="color: green">', $_SESSION['success'],"</p>";
                        unset($_SESSION['success']);    
                    }
                ?>    
            </div>
            
            <div class="col-12 offset-md-1 col-md-8">
                <form method="post" id="forgotForm">
                    <div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-lg-right text-md-center">Email:</label>
                        <div class="col-md-5">
                            <input type="email" class="form-control pill" id="email" name="email" placeholder="Give email you registered with">
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
							
	
	<!-- Footer -->
	<?php include_once 'footerv2.php'; ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
