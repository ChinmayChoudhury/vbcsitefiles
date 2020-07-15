<?php
	
	session_start();
	// enable in production
	if (!isset($_SESSION['user'])) {
		$_SESSION['error'] = "Kindly login first.";
		header("Location: signinv2.php"); return;
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img_2020/logo.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css_2020/register.css">
    <link rel="stylesheet" href="css_2020/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css_2020/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">

    <?php 
    	if(!$_REQUEST){
    		echo '<title>VBC | Dashboard</title>';
    	}
	?>

    <!-- <title>Dashboard<title> -->
</head>
<body>

	<!-- dashboard navbar -->
	<nav class="navbar sticky-top navbar-expand-md">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
			<span class="navbar-toggler-icon">
				<i class="fa fa-navicon" style="color:#333333; font-size:28px;"></i>    
			</span>
		</button>
		<div class="d-md-none header2">
			Visual Bloggers' Club &nbsp;
			<img src="img_2020/logo.png" height="30" width="30" alt="VBC Logo">
		</div>
		<a class="navbar-brand mr-auto" href="#"></a>
		<div class="collapse navbar-collapse" id="Navbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item" id="blogs"><a class="nav-link <?php echo !$_REQUEST?'active': ''; ?>" href="./dashboardv2.php">Dashboard</a></li>
				&nbsp;
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Posts
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="dashboardv2.php?addpost">Add post</a>
						<a class="dropdown-item" href="dashboardv2.php?view_post">View posts</a>
					</div>
				</li>
				<?php if($_SESSION['userstatus'] > 1) {?>
				&nbsp;
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Admin roles
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="dashboardv2.php?approve_posts">Approve posts</a>
						<a class="dropdown-item" href="dashboardv2.php?view_all_posts">View all posts</a>
						<a class="dropdown-item" href="dashboardv2.php?add_category">Manage categories</a>
					</div>
				</li>
				&nbsp;
				<?php } ?>
				<li class="nav-item" id="dashboard"><a class="nav-link <?php echo isset($_REQUEST['whatsnew'])?'active': ''; ?>" href="dashboardv2.php?whatsnew">What's new</a></li>
				&nbsp;
				<li class="nav-item" id="dashboard"><a class="nav-link" href="blogpagev2.php">Return</a></li>
				&nbsp;
				<li class="nav-item" id="dashboard"><a class="nav-link" href="contactv2.php">Contact</a></li>								
			</ul>
			<span class="nav-item">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item" id="dashboard"><a class="nav-link <?php echo isset($_REQUEST['profile'])?'active': ''; ?> " href="dashboardv2.php?profile">Profile</a></li>
					<li class="nav-item" id="logout"><a class="nav-link" href="/logoutv2.php">Logout</a></li>
				</ul>
			</span>
		</div>
	</div>
	</nav>

	<!-- nav end -->

	<div class="container">	
		<?php if (!$_REQUEST) { ?>
		<h3 class="text-center">Welcome <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : '***DEMO***'; ?>!!</h3>	
	
	<?php } ?>

		<div id="content">
			<!-- display respective content on dashboard -->
			<?php 
				if (isset($_REQUEST['addpost'])) {
					include_once 'addpost.php';
				}
				elseif (isset($_REQUEST['view_post'])) {
					include_once 'view_post.php';	
				}
				elseif (isset($_REQUEST['whatsnew'])) {
					include_once 'whatsnew.php';
				}
				elseif (isset($_REQUEST['profile'])) {
					include_once 'profile.php';
				}
				//admin roles
				elseif (isset($_REQUEST['approve_posts']) && $_SESSION['userstatus'] > 1) {
					include_once 'approve_posts.php' ;
				}
				elseif(isset($_REQUEST['view_all_posts']) && $_SESSION['userstatus'] > 1){
					include_once 'view_all_posts.php';
				}
				elseif(isset($_REQUEST['manage_cat']) && $_SESSION['userstatus'] > 1){
					include_once 'manage_cat.php';
				}

				
			?>
		</div>
	</div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>