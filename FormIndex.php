<?php
    session_start();
    if (!isset($_SESSION['subject'])) {
        header('Location: FormHomeActivity.php');
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
<link rel="stylesheet" type="text/css" href="CSS/FormIndex.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <a class="navbar-brand"></a>
    <ul class="nav navbar-nav navbar-right">  
        <li class="nav-item">
        <a class="f1" href="FormHomeActivity.php">Home</a>
        </li>
         <li class="nav-item">
        <a class="f1" href="FormLesson.php?subID=<?php echo $subject; ?>">Lesson</a>
        </li>
        <li class="nav-item">
        <a class="f1" href="FormExercises.php">Exercises</a>
        </li>
        <li class="nav-item">
        <a class="f1" href="FormDownload.php">Downloads</a>
        </li>
        <li class="nav-item">
        <a class="f1" href="FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<!-- lesson-->
<div class="">
	<h3 class="h3Over">Overview</h3>
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
			<?php

					$db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
					$db->query("set names utf8");
					//thuc hien cau truy van
					?>
				<div class="container">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">Number</div>
                            <div class="col col-4">Session</div>
                            <div class="col col-4">File</div>
                            <div class="col col-2">Action</div>
                        </li>
                        <?php           
                        $subject= $_GET['subID'];
                        $course = $db->query("SELECT LessonID,LessonChapter,SubjectID,FileLocation from tbllesson where SubjectID='$subject' ");
                        foreach ($course as $item) {
                            
                            // echo "<pre>";
                            // print_r ($item);
                            // echo "</pre>";?>

                        <li class="table-row">
                            <div class="col col-1" ><?php echo $item['LessonID']; ?></div>
                            <div class="col col-4" ><?php echo $item['LessonChapter'];?></div>
                            <div class="col col-4" ><?php echo $item['FileLocation'];  ?></div>
                            <div class="col col-2" ><a href="FormLesson.php">View</a></div>
                        </li>
                    

            <?php  }?>	</ul>	  	
			</thead>
		</table>
	</div>
</div>

</body>