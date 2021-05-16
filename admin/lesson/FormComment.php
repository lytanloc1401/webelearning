<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../../FormLogin.php');
    exit();
}
require_once("../../db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../CSS/FormIndex.css">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <li class="nav-item">
        <a class="f1" href="../">Home</a>
        </li>
        <a class="navbar-brand"></a>
    <ul class="nav navbar-nav navbar-right">           
        <li class="nav-item">
        <a class="f1" href="../../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>

<div class="container">
<?php

$db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
$db->query("set names utf8");
//thuc hien cau truy van
$subject= $_GET['subID'];
$LessonID= $_GET['LesID'];
?>
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">name</div>
                            <div class="col col-4">comment</div>
						</li>
						<?php
						$course = $db->query("SELECT * from tblcomment where SubjectID='$subject' and  LessonID='$LessonID'");
						foreach ($course as $item) {
                              
							// echo "<pre>";
							// print_r ($item);
							// echo "</pre>";?>
						<li class="table-row">
                            <div class="col col-1"><?php echo $item['name'];?></div>
                            <div class="col col-4"><?php echo $item['title'];?></div>
						</li>
						<?php }?>
					</ul>
</div>

<form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	<label for="comment">Comment:</label>
	<textarea name="title" class="form-control" rows="1" id="comment" placeholder="write comment"></textarea>
	</div>
	<div class="form-group">
	<button id="idno" class="btn btn-primary btn-sm" name="send" type="submit" ><span class="fa fa-save fw-fa"></span>SEND</button>
	</div>
</form>
<?php

$email= $_SESSION['user'];
$sql = "SELECT FNAME,Lname FROM tblusers WHERE UEMAIL = '$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['send'])){
	$subject= $_GET['subID'];
	$LessonID=$_GET['LesID'];
	$name= $row['FNAME']. $row['Lname'];
	$title = $_POST['title'];
	if ($subject==''|| $LessonID==''|| $name==''|| $title==''){
		echo "please enter comment";
	}else{
		$sql1= "INSERT INTO tblcomment(
			SubjectID,
			LessonID,
			name,
			title
		)VALUES (
			'$subject',
			'$LessonID',
			'$name',
			'$title'	
		)";
		mysqli_query($conn,$sql1);
		header("refresh:0");
	}
}
?>
</body>

</html>