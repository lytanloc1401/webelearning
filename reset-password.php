<?php
require("db.php");
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require('vendor/autoload.php');

 
$conn = mysqli_connect("localhost", "root", "", "db_elearning");
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];



$sql = "SELECT * FROM tblstudent WHERE STUDUSERNAME = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Reset Password</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
			<link rel="stylesheet" href="style.css" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>
		<body>
			
				<!-- <input type="hidden" name="email" value="<?php echo $email; ?>">
				<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
				
				<input type="password" name="new_password" placeholder="Enter new password">
				<input type="submit" value="Change password"> -->
				<div class="card login-form">
					<div class="card-body">
						<h3 class="card-title text-center">Change password</h3>
		
						<!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->
		
						<div class="card-text">
							<form method="POST" action="new-password.php">
								<div class="form-group">
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
									<!-- <label for="exampleInputEmail1">Your new password</label> -->
									<input type="password" class="form-control form-control-sm" name="new_password" placeholder="new password">
								</div>
								<div class="form-group">
									<!-- <label for="exampleInputEmail1">Repeat password</label> -->
									<input type="password" class="form-control form-control-sm" name="new_password" placeholder="confirm password">
								</div>
								<button type="submit" class="btn btn-primary btn-block submit-btn">Confirm</button>
							</form>
						</div>
					</div>
				</div>
			
		</body>
		</html>
		
		<?php
	}
	else
	{
		echo "Recovery email has been expired";
	}
}
else
{
	echo "Email does not exists";
}

?>