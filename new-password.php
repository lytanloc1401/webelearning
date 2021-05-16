<?php
include('db_elearning.sql');
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];

$conn = mysqli_connect("localhost", "root", "", "db_elearning");

$sql = "SELECT * FROM tblstudent WHERE STUDUSERNAME = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		$sql = "UPDATE tblstudent SET reset_token ='', STUDPASS ='$new_password' WHERE STUDUSERNAME ='$email'";
		mysqli_query($conn, $sql);
		/* echo '<script language="javascript">';
		echo 'alert("Password has been changed")';
		echo '</script>';*/
		echo "successfully";
	}
	else
	{
		/*echo '<script language="javascript">';
		echo 'alert("Recovery email has been expired")';
		echo '</script>';
		*/
	}
}
else
{
	/*
	echo '<script language="javascript">';
	echo 'alert("Email does not exists")';
	echo '</script>';
	*/
}
?>
