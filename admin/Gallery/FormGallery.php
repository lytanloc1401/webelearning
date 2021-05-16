<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../FormLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/FormGallery.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/finalProjectWEB/CSS/FormHomeActivity.css">

</head>
<body>
<div class="h3Over">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <a class="navbar-brand"></a>
        <ul class="nav navbar-nav navbar-right">  
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Exercise/add.php?subID=<?php echo $_GET['subID'];?>">Exercises</a>
          <a class="dropdown-item" href="../lesson/add.php?subID=<?php echo $_GET['subID'];?>">Lession</a>  
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
</div>

			<div class="row">
      <div class="col-sm-3">
					<ul class="list-group">
						<li class="list-group-item"><a href="../">Dashboard</a></li>
						<li class="list-group-item"><a href="../lesson/FormLesson.php?subID=<?php echo $_GET['subID'];?>">Lesson</a></li>
						<li class="list-group-item"><a href="../Exercise/FormExercise.php?subID=<?php echo $_GET['subID'];?>">Exercises</a></li>
                    </ul>
                    <ul class="list-group">
						<li class="list-group-item"><a href="FormGallery.php?subID=<?php echo $_GET['subID'];?>">Galery</a></li>
						<li class="list-group-item"><a href="../student/FormStudent.php?subID=<?php echo $_GET['subID'];?>">Manage Students</a></li>
					</ul>
				</div>   

				<div class="col-sm-9" style="margin-top: 10px" >
                <div  class="wrap-content">
                    <div class="container-fluid pb-video-container">
                <div class="col-md-10 col-md-offset-1">
                    <h3 class="headericon">Video Gallery</h3> 

                                <?php 
                                /** 
                                    $mydb->setQuery("SELECT * FROM `tbllesson` ");
                                    $cur = $mydb->loadResultList();

                                    foreach ($cur as $result) {  

                                        if ($result->Category=='Video') {

                        */
                        ?>          
                                        <div class="span4"> 
                                            <div class="stretch">
                                                
                                                <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                                </iframe>
                                            </div>
                                        </div>
                            
                    </div> 
                </div>                                     

                </div>
				</div>
			</div>

</body>