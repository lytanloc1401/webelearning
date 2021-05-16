<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../../FormLogin.php');
    exit();
}
  $user = $_SESSION['user'];
  require_once('../../db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/FormHomeActivity.css">
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
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Exercise/add.php?subID=<?php echo $_GET['subID'];?>">Exercises</a>
          <a class="dropdown-item" href="add.php?subID=<?php echo $_GET['subID'];?>">Lession</a>  
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container" style="margin-top: 60px;  margin-left: 10px; background-color: #d4d1cd ">
			<div class="row">
      <div class="col-sm-3">
					<ul class="list-group">
						<li class="list-group-item"><a href="../">Dashboard</a></li>
						<li class="list-group-item"><a href="FormLesson.php?subID=<?php echo $_GET['subID'];?>">Lesson</a></li>
						<li class="list-group-item"><a href="../Exercise/FormExercise.php?subID=<?php echo $_GET['subID'];?>">Exercises</a></li>
                    </ul>
                    <ul class="list-group">
						<li class="list-group-item"><a href="../Gallery/FormGallery.php?subID=<?php echo $_GET['subID'];?>">Galery</a></li>
						<li class="list-group-item"><a href="../student/FormStudent.php?subID=<?php echo $_GET['subID'];?>">Manage Students</a></li>
					</ul>
				</div>   
				<div class="col-sm-9">
            <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">

            <div class="row">
            <div class="col-lg-12">
            <h1 class="page-header">Upload New Lesson</h1>
            </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "ID">ID:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="ID" name="ID" placeholder=
                            "ID" type="text" value="">
                      </div>
                    </div>
                  </div> 

            <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "LessonChapter">Chapter:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                          <input class="form-control input-sm" id="LessonChapter" name="LessonChapter" placeholder=
                            "Chapter" type="text" value="">
                      </div>
                    </div>
                  </div>
                      
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
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "Category">Select File Type:</label>

                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                          <select class="form-control input-sm" id="Category" name="Category" >
                            <option>Docs</option>
                            <option>Video</option>
                          </select>
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2" for=
                      "file">Upload File:</label>

                      <div class="col-md-10">
                      <input id="file" type="file" name="file"/>
                      </div>
                    </div>
                  </div>

              <div class="form-group">
                    <div class="col-md-11">
                      <label class="col-md-2 control-label" for=
                      "idno"></label>

                      <div class="col-md-10">
                        <button id="idno" class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                          </div>
                    </div>
                  </div> 
            </form>             
				</div>
			</div>
    </div>
    <!-- CREATE LESSON-->
    <?php
		if (isset($_POST["save"])) {
        //get form information
        $ID = $_POST["ID"];
  			$chapter = $_POST["LessonChapter"];
  			$title = $_POST["IDsubject"];
 			  $type = $_POST["Category"];
        $pname = $_FILES["file"]["name"];
 
         #temporary file name to store file
         $tname = $_FILES["file"]["tmp_name"];
        
          #upload directory path
        $uploads_dir = 'fileLesson';
         #TO move the uploaded file to specific location
         move_uploaded_file($tname, $uploads_dir.'/'.$pname);
			

  			//test
			  if ($ID == "" || $chapter == "" || $title == "" || $type == "" || $pname == "" ) {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// test account exist
  					$sql1="SELECT * FROM tbllesson WHERE LessonID='$ID'";
					  $kt=mysqli_query($conn, $sql1);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO tbllesson(
	    					LessonID,
	    					LessonChapter,
                SubjectID,
						    FileLocation,
                Category
	    					) VALUES (
	    					'$ID',
	    					'$chapter',
	    					'$title',
                '$pname',
							  '$type'

	    					)";
					    // thực thi câu $sql với biến conn lấy từ file
               mysqli_query($conn,$sql);
				   		echo "thành công";
					}
									    
					
			  }
	}
?>   


</body>