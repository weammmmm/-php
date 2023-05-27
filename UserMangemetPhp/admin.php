<?php 
session_start();
include'connection.php';
include 'headerAdmin.php';
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
     <style>
		h1 {
			color: #333;
			font-size: 24px;
			margin-top: 20px;
			text-align: center;
		}

		nav.home-nav {
			margin-top: 30px;
			text-align: center;
		}

		nav.home-nav a {
			display: inline-block;
			margin: 10px;
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			text-decoration: none;
		}
	</style>
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <h1>Hello, <?php echo $_SESSION['email']; ?></h1>

     <h1>Hello, <?php echo $_SESSION['id']; ?></h1>
     <h1>Hello, <?php echo $_SESSION['user_type']; ?></h1>


     <nav class="home-nav">
     	<a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
     </nav>
     <?php include 'footer.php'; ?>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>