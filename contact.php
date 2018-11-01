<?php 
	include "inc/header.php";

	$db = new Database();
	$fm = new Format();
?>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$firstname = $fm->validate($_POST['firstname']);
		$lastname = $fm->validate($_POST['lastname']);
		$email = $fm->validate($_POST['email']);
		$msg = $fm->validate($_POST['msg']);

		if(empty($firstname)){
			$error = "Please Enter First Name";
		}else if(empty($lastname)){
			$error = "Please Enter Last Name";
		}else if(empty($email)){
			$error = "Please Enter Email";
		}else if(empty($msg)){
			$error = "Please Enter Your Message";
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Please Enter First Name";
		}else{
			$ok = "Message Sent Successfully :)";
		}
	}

?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us <?php 
					if(isset($error)){
						echo "<span style='color:red; '>$error</span>";
					}else if(isset($ok)){
						echo "<span style='color:green; '>$ok</span>";
					} 
				?></h2>
				
			<form action="" method="post">
				<table>
				<tr>
					<td>First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Message:</td>
					<td>
					<textarea name="msg"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
	
	<?php 
		include "inc/sidebar.php";
		include "inc/footer.php";  
	?>