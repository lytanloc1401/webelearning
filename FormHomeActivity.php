<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: FormLogin.php');
    exit();
}
  require_once("db.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/FormHome.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<p class="f2" >CLASSROOM</p>
        <div class="container-fluid">
            <div class="dropdown"> </div>
      <ul class="list-inline">
      <li class="list-inline-item">
          <button class="add btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </button>
      </li>
        <li class="list-inline-item">
          <a class="na" href="FormLogout.php">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        </li>
      </ul>

    </div>  
  </div>
</nav>

<div class="modal fade" id="addCourseModal">
        <div class="modal-dialog">
        <div class="modal-content">
		<form method="post">
            <div class="modal-header">
            <h4 class="modal-title">Join class</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input name="ID" type="text" placeholder="ID class" value="" class="form-control"/>
            </div>
        
            <div class="modal-footer">
                <button name="join" type="submit" class="btn btn-primary">Join</button>
            </div>            
			</div>
			</form>
        </div>
        </div>
<div class="container">

<!-- dòng phải là con trực tiếp của container, mang class row -->
<div class="row">

<?php
$_SESSION['subject']="0";
$db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
$db->query("set names utf8");
//thuc hien cau truy van
$user = $_SESSION['user'];
$sql2 = "SELECT StudentID FROM tblstudent WHERE STUDUSERNAME  = '$user' ";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);
$Stuid= $row2["StudentID"];
$course = $db->query("select * from tblsubstu where StudentID='$Stuid'");

?>  

<?php

foreach ($course as $item) {

// echo "<pre>";
// print_r ($item);
// echo "</pre>";

?>

        <div class="col-lg-3 col-6">
        <div class="card shadow mt-5">
            <div class="card-body">
              <h5 class="headericon"><?php echo $item['Subjects'];?></h5>
              <p class="h3Over">Teacher: <?php echo $item['Teacher'];?></p>
              <p class="h3Over">Course: <?php echo $item['SubjectID']; ?></p>
              <p class="h3Over">ROOM: <?php echo $item['ROOM']; ?></p>
              <img class="mw-100" src="image/avatarclass.png" alt="avatar">
              <p></p>
              <div id="ctn">
                <button class="learn-more">
                  <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                  </span>
                  <a href="FormLesson.php?subID=<?php echo $item['SubjectID']; ?>" class="button-text">Learn More</a>
                </button>
              </div>
            </div>
        </div>
        </div>
<?php }?>  

<?php 
		// test user kicck button login
		if (isset($_POST["join"])) {
			// get user information
        $ID = $_POST["ID"];
        $user = $_SESSION['user'];
			if ($ID == "" ) {
				echo "please enter ID";
			}else{
        $sql1 = "SELECT*FROM tblsubjects WHERE SubjectID  = '$ID' ";
        $query1 = mysqli_query($conn, $sql1); 
        $sql2 = "SELECT StudentID FROM tblstudent WHERE STUDUSERNAME  = '$user' ";
        $query2 = mysqli_query($conn, $sql2);
				
				if (mysqli_num_rows($query1) == 0 & mysqli_num_rows($query2) == 0) {
					echo "NO class !";
					                      
        }else{
          $row2 = mysqli_fetch_assoc($query2);
          $Stuid= $row2["StudentID"];
          $row1 = mysqli_fetch_assoc($query1);
          $subid=$row1["SubjectID"];
          $sub=$row1["Subjects"];
          $subtea=$row1["Teacher"];
          $subroom=$row1["ROOM"];
          $sql = "INSERT INTO tblsubstu(SubjectID ,StudentID ,Subjects,Teacher,ROOM) VALUES ('$subid','$Stuid','$sub','$subtea','$subroom')";
          // thực thi câu $sql với biến conn lấy từ file
          
          mysqli_query($conn,$sql); 
        }
      }
    }
         

?>

</body>
</html>
