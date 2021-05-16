
<?php
   session_start();
   require_once("../../db.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <a class="navbar-brand"></a>
        <ul class="nav navbar-nav navbar-right">  
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add.php?subID=<?php echo $_GET['subID'];?>">Exercises</a>
          <a class="dropdown-item" href="../lesson/add.php?subID=<?php echo $_GET['subID'];?>">Lession</a>  
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container" style="margin-top: 60px; margin-left: 10px; background-color: #d4d1cd ">
			<div class="row">
      <div class="col-sm-3">
					<ul class="list-group">
						<li class="list-group-item"><a href="../">Dashboard</a></li>
						<li class="list-group-item"><a href="../lesson/FormLesson.php?subID=<?php echo $_GET['subID'];?>">Lesson</a></li>
						<li class="list-group-item"><a href="FormExercise.php?subID=<?php echo $_GET['subID'];?>">Exercises</a></li>
                    </ul>
                    <ul class="list-group">
						<li class="list-group-item"><a href="../Gallery/FormGallery.php?subID=<?php echo $_GET['subID'];?>">Galery</a></li>
						<li class="list-group-item"><a href="../student/FormStudent.php?subID=<?php echo $_GET['subID'];?>">Manage Students</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
                <form class="form-horizontal span6" action="" method="POST" style="margin-top: 20px;"> 
                        <div class="row">
                           <div class="col-lg-12">
                              <h1 class="page-header">Add New Exercises</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                         </div>
                         <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for="ID">ExerciseID</label>

                          <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input type="text" id="ID" name="ID" >
                         </div>
                        </div>
                      </div>
                      <?php
                          
                          $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
                          $db->query("set names utf8");
                          //thuc hien cau truy van
                          $subid=$_GET['subID'];
                          $course = $db->query("select LessonID from tbllesson where SubjectID='$subid'");
                        ?>  
                        <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Lesson">LessonID:</label>

                          <div class="col-md-8">
                          <input name="deptid" type="hidden" value=""> 
                          <select class="form-control" id="Lesson" name="Lesson">
                            <option>ID_Lesson</option>
                            <?php
                            foreach ($course as $item) {
    
                            // echo "<pre>";
                            // print_r ($item);
                            // echo "</pre>";?>
                            
                            <option><?php echo $item['LessonID'];?></option>
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- select ID subject-->
                      <?php
                          $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
                          $db->query("set names utf8");
                          //thuc hien cau truy van
                          $course = $db->query('select * from tblsubjects');
                        ?>  
                      <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for="IDsubject">IDsubject:</label>

                          <div class="col-md-8"> 
                          <input name="deptid" type="hidden" value="">
                            <select class="form-control" id="IDsubject" name="IDsubject">
                            <option>ID_Subject</option>
                            <option><?php echo $_GET['subID'];?></option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for="Text">Text</label>

                          <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input type="text" id="Text" name="Text" >
                         </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label">chọn ngày hạn:</label>

                          <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input type="text" id="datepicker" name="date" >
                         </div>
                        </div>
                      </div>
                    <div class="col-md-8">
                           <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> 
                           </div>
                        </div>
                      </div> 
                      </form>                
				</div>
			</div>
    </div>
    <?php	
      if (isset($_POST["save"])) 
      {
  			//get form information
  			$id = $_POST["ID"];
  			$Lesson = $_POST["Lesson"];
        $IDsubject = $_POST["IDsubject"];
        $text = $_POST["Text"];
        $date =  $_POST['date']; 

  			//test
			  if ($id == "" || $Lesson == "" || $IDsubject == "" || $text  == "" || $date  == "") {
				   echo "please, enter your information";
  			}else{
  					// test account exist
  					$sql1="SELECT * FROM tblexercise WHERE ExerciseID ='$id'";
					  $kt=mysqli_query($conn, $sql1);

					if(mysqli_num_rows($kt)  > 0){
						echo "subjects exist";
					}else{
	    				$sql = "INSERT INTO tblexercise(
	    					TEXT,
	    					ExerciseID,
                LessonID,
						    SubjectID,
                ExercisesDate
	    					) VALUES (
	    					'$text',
	    					'$id',
	    					'$Lesson',
                '$IDsubject',
							  '$date'

                )";
               mysqli_query($conn,$sql);
               echo "save thanh cong";  
              }
									    
					
        }
      }

?>
</body>