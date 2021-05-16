<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../FormLogin.php');
    exit();
}
  require_once("../db.php");
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

<link rel="stylesheet" href="../CSS/FormHomeActivity.css">
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
            <a class="dropdown-item" href="Exercise/add.php">Exercises</a>
            <a class="dropdown-item" href="lesson/add.php">Lession</a>  
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../FormLogout.php">Logout</a>
          </li>
      </ul>
    </div>
  </nav>
</div>
  <div class="wrap-bpdy">
    <div class="row">
        <?php include "home-sidebar.php" ?>
				<div class="col-sm-9">
          <div class="wrap-content">
          <div class="module-head"> 
                    <h1 class="headericon">List of Teacher</h1> 
                    
                    </div> 
                        <form>  					
                        <table id="example"  class="datatable-1 table table-striped table-hover" cellspacing="0" style="font-size:12px" >
                            
                        <thead>
                        <?php

                          $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
                          $db->query("set names utf8");
                          //thuc hien cau truy van
                          ?>
                          <div class="container">
                          <ul class="responsive-table">
                            <li class="table-header">
                              <div class="col col-4">ID</div>
                              <div class="col col-4">Name</div>
                              <div class="col col-4">Mail</div>
                            </li>
                          <?php
                            $course = $db->query('select USERID, NAME, UEMAIL from tblusers');
                            foreach ($course as $item) {
                              
                              // echo "<pre>";
                              // print_r ($item);
                              // echo "</pre>";?>  
                              <li class="table-row">
                              <div class="col col-1" ><?php echo $item['USERID'];  ?></div>
                              <div class="col col-4" ><?php echo $item['NAME'];  ?></div>
                              <div class="col col-4" ><?php echo $item['UEMAIL'];  ?></div>
                            </li>
                            <?php  }?>	

                        </thead> 	
                        
                      </table> 
                    </form>
                   
          </div>
         
				</div>
		</div>
  </div>  



</body>
</html>