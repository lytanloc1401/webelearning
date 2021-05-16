<?php
	ob_start();
	session_start();
	if (isset($_SESSION['user'])) {
		header('Location: FormHomeActivity.php');
		header('Location: admin/Index.php');
        exit();
    }
	require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
 
<title>Login - TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<link rel="stylesheet" type="text/css" href="CSS/FormLoginStyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
	<!-- Form Chính -->
	<div class="text-center">
		<img src="https://www.tdtu.edu.vn/sites/www/files/Brand-left-vi-1_0_0.png" alt="Avatar">
	</div>  
	<div class="login-form">
		<h2 >Login</h2>
		<div class="text-center">
			<img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Anony">
		</div>  
		<form action="" method="post">
			<div class="form-group">
				<input name="user" value="lytanloc141@gmail.com" type="email" class="form-control" placeholder="Email" required="required">		
			</div>
			<div class="form-group">
				<input name="pass" value="1" type="password" class="form-control" placeholder="Password" required="required">	
			</div> 
			<div class="form-group">
				<button name="login" type="submit" class="btn btn-primary btn-block">Sign in</button>
			</div>
			<div class="bottom-action clearfix">
				<a href="enteremail.php" class="float-right" style="text-decoration:none" >Forgot Password?</a>
			</div>        
		</form>
		<p class="text-center"><a href="#SignIn" style="text-decoration:none" data-toggle="modal">Create new account</a></p>
	</div>

	<!-- Form Tạo Tài Khoản-->
	<div id="SignIn" class="modal fade">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<img src="https://www.timeshighereducation.com/sites/default/files/styles/medium/public/logo_tdtu.png?itok=M5DTmtTR" alt="Avatar">
					</div>				
					<h4 class="modal-title">Create your account</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="FormLogin.php" method="post">
					<div class="form-group">
							<input type="text" class="form-control" name="ID" placeholder="IDStudent" required="required">		
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
								<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
							</div>        	
						</div>
						<div class="form-group">
							<input id="datepicker" type="text" class="form-control" name="date" placeholder="dd/mm/yy" required="required">		
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Email" required="required">		
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="mobile" placeholder="MobileNo" required="required">	
						</div>     
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
						</div>     
						<div class="form-group">
							<input type="password" class="form-control" name="ConfPass" placeholder="Confirm Password" required="required">	
						</div>    
						<div class="form-group">
							<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a> of TDT University.</label>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-btn" name="Create">Create</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div class="text-center">Already have an account? <a href="FormLogin.php">Sign in</a></div>
				</div>
			</div>
		</div>
	</div>  

	<!-- Login-->
	<?php 
		try{
		// test user kicck button login
		if (isset($_POST["login"])) {
			// get user information
			$username = $_POST["user"];
			$password = $_POST["pass"];
			if ($username == "" || $password =="") {
				echo "please enter email and password";
			}else{
				$sql = "SELECT * FROM tblstudent WHERE STUDUSERNAME = '$username' AND STUDPASS = '$password' ";
				$query = mysqli_query($conn, $sql);
				echo mysqli_num_rows($query);
				
				if (mysqli_num_rows($query) == 0) {
					echo "invalid username or password !";
					
					
				}else{
					
					//save user in session
					$_SESSION['user'] = $username;
					echo $username;
					
					header("Location: FormHomeActivity.php");
				}
			}
		}
	}catch(Exception $e){
		echo $query;
	}

?>
<!-- create account-->
<?php
		if (isset($_POST["Create"])) {
			  //get form information
			$id = $_POST["ID"];
  			$firstname = $_POST["first_name"];
			$lastname = $_POST["last_name"];
			$date  = $_POST["date"];
			$email = $_POST["email"];
			$mobile = $_POST["mobile"];
			$pass = $_POST["password"];
			$confpass = $_POST["ConfPass"];
			
  			//test
			  if ($id == "" ||$firstname == "" || $lastname == "" || $date == "" || $mobile == "" || $email == "" || $pass == "" || $confpass== "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
			  }else if($pass != $confpass){
				  echo "confirm password không giống";

			  }else{
  					// test account exist
  					$sql1="SELECT * FROM tblstudent WHERE STUDUSERNAME='$email'";
					$kt=mysqli_query($conn, $sql1);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO tblstudent( 
							StudentID,
	    					Fname,
	    					Lname,
							DateOfBirth,
							MobileNo,
	    					STUDUSERNAME,
						    STUDPASS
	    					) VALUES (
							'$id',
	    					'$firstname',
	    					'$lastname',
							'$date',
							'$mobile',
	    					'$email',
							'$pass'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file
   						mysqli_query($conn,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
?>
<!-- login of teacher-->
<?php 
		try{
		// test user kick button login
		if (isset($_POST["login"])) {
			// get user information
			$username = $_POST["user"];
			$password = $_POST["pass"];
			if ($username == "" || $password =="") {
				echo "please enter email and password";
			}else{
				$sql1 = "SELECT * FROM tblusers WHERE UEMAIL = '$username' AND PASS = '$password' ";
				$query1 = mysqli_query($conn, $sql1);
				
				if (mysqli_num_rows($query1) == 0) {
					echo "invalid username or password !";
					
					
				}else{
					
					//save user in session
					$_SESSION['user'] = $username;
					echo $username;
					
					header("Location: admin/Index.php");
				}
			}
		}
	}catch(Exception $e){
		echo $query;
	}

?>

<!-- Login Owner-->
<?php 
		try{
		// test user kick button login
		if (isset($_POST["login"])) {
			// get user information
			$username = $_POST["user"];
			$password = $_POST["pass"];
			if ($username == "" || $password =="") {
				echo "please enter email and password";
			}else{
				$sql1 = "SELECT * FROM tblowner WHERE useremail = '$username' AND password = '$password' ";
				$query1 = mysqli_query($conn, $sql1);
				echo mysqli_num_rows($query1);
				
				if (mysqli_num_rows($query1) == 0) {
					echo "invalid username or password !";
					
					
				}else{
					
					//save user in session
					$_SESSION['user'] = $username;
					echo $username;
					
					header("Location: Owner/FormOwner.php");
				}
			}
		}
	}catch(Exception $e){
		echo $query;
	}

?>
</body>
</html>