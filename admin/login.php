 <?php
 	include "../lib/Session.php";
 	Session::init();
 ?>
 <?php
	include "../lib/Database.php";
	include "../config/config.php";
	include "../helpers/Format.php";
?>
<?php
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
			if($_SERVER['REQUEST_METHOD']=="POST"){
				$username = $fm->validate($_POST['username']);
				$password = $fm->validate(md5($_POST['password']));

				$query = "select * from tbl_user where username='$username' and password='$password'";
				$result = $db->select($query);

				if($result){
					$row = mysqli_fetch_array($result);

					Session::set("login", true);
					Session::set("username", $row['username']);
					Session::set("userid", $row['id']);
					header("Location:index.php");

				}else{
					echo "<span style='color:red; font-size:20px;'>Username or Password didn't match</span>";
				}

			}
		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>