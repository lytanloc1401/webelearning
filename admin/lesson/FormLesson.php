<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../FormLogin.php');
    exit();
}
require_once("../../db.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/FormLesson.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/finalProjectWEB/CSS/FormHomeActivity.css">

</head>
<script>
	function updatedeleteFiledialog(filename){
		let label = $('#file-to-delete');
		let param = $('#file-to-delete-input');

		label.html(filename);
		param.val(filename);
	}
	function update(filename){
		let label = $('#file-to-update');
		let param = $('#file-to-update-input');

		label.html(filename);
		param.val(filename);
	}
</script>
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
            <a class="dropdown-item" href="add.php?subID=<?php echo $_GET['subID'];?>">Lession</a>  
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
						<li class="list-group-item"><a href="FormLesson.php?subID=<?php echo $_GET['subID'];?>">Lesson</a></li>
						<li class="list-group-item"><a href="../Exercise/FormExercise.php?subID=<?php echo $_GET['subID'];?>">Exercises</a></li>
                    </ul>
                    <ul class="list-group">
						<li class="list-group-item"><a href="../Gallery/FormGallery.php?subID=<?php echo $_GET['subID'];?>">Galery</a></li>
						<li class="list-group-item"><a href="../student/FormStudent.php?subID=<?php echo $_GET['subID'];?>">Manage Students</a></li>
					</ul>
				</div>   
    <div class="col-sm-9" style="margin-top: 10px" >
            <div  class="wrap-content">
                <h1 class="headericon">List of Lessons <a href="add.php?subID=<?php echo $_GET['subID'];?>" class="btn btn-outline-primary"><i class="fa fa-plus-circle fw-fa"></i> New</a></h1> 
                <p></p> 
            <form>  
			      <div class="table-responsive">			
			        <table id="example" class="datatable-1 table table-striped table-hover" style="font-size:12px" cellspacing="0">
				
				    <thead>
            <?php

              $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
              $db->query("set names utf8");
              ?>
                    <div class="container">
                      <ul class="responsive-table">
                        <li class="table-header">
                          <div class="col col-2">Session</div>
                          <div class="col col-4">Subject</div>
                          <div class="col col-4">File - Type</div>
                          <div class="col col-2">Action</div>
                        </li>
                        <?php
                            
                            $Subid= $_GET['subID'];
                            $course = $db->query("select LessonID, SubjectID, FileLocation from tbllesson where SubjectID = '$Subid'");
                            foreach ($course as $item) {
                              
                              // echo "<pre>";
                              // print_r ($item);
                              // echo "</pre>";?>
                        <li class="table-row">
                          <div class="col col-1" ><?php echo $item['LessonID']; ?></div>
                          <div class="col col-4" ><?php echo $item['SubjectID'];?></div>
                          <div class="col col-4" ><?php echo $item['FileLocation'];  ?></div>
                          <div class="col col-2" >
                              <i onclick="updatedeleteFiledialog('<?php echo $item['LessonID'];  ?>')" class="fa fa-trash action" data-toggle="modal" data-target="#confirm-delete"></i>
                              <i onclick="update('<?php echo $item['LessonID'];  ?>')" class="fa fa-edit action" data-toggle="modal" data-target="#confirm-rename" ></i>
                              <a href="FormComment.php?subID=<?php echo $_GET['subID'];?>&LesID=<?php echo $item['LessonID']; ?>">View</a>
                          </div>
                        </li>
            <?php  }?>		  	
          </ul>
				    </thead> 
				    
				    </table> 
			    </div>
				</form>
	 
            </div>
            
		</div>
    </div>
</div>
<!-- Delete dialog -->
<div class="modal fade" id="confirm-delete">
        <div class="modal-dialog">
          <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              <h4 class="modal-title">Xóa</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              Bạn có chắc rằng muốn xóa account <strong id="file-to-delete" >account</strong>
            </div>
        
            <div class="modal-footer">
				<input type="hidden" name="action" value="delete-file">
				<input type="hidden" name="path" value="<?= $dir ?>">
				<input type="hidden" name="file-name" value="account" id="file-to-delete-input">
                <button name="delete" type="submit" class="btn btn-danger">xóa</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            </div>            
			</div>
			</form>
        </div>
    </div>
  <!-- Rename dialog -->
<div class="modal fade" id="confirm-rename">
        <div class="modal-dialog">
        <div class="modal-content">
		<form method="post">
            <div class="modal-header">
            <h4 class="modal-title">Đổi tên</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
				<p>Nhập thông tin mới cho tập tin <strong id="file-to-update">Document</strong></p>
        <label class="col-md-2" for= "file">Upload File:</label>
                      <input id="file" type="file" name="file"/>
        
            <div class="modal-footer">
			  <input type="hidden" name="action" value="update-file">
				<input type="hidden" name="paths" value="<?= $dir ?>">
				<input type="hidden" name="file-names" value="account" id="file-to-update-input">
                <button name="update" type="submit" class="btn btn-primary">Lưu</button>
            </div>            
			</div>
			</form>
        </div>
        </div>
							
    <?php
/*xoa*/
if(isset($_POST['action'])){
	$action = $_POST['action'];
	if($action =='delete-file' && isset($_POST['path'])&& isset($_POST['file-name'])){
		$path = $_POST['path'];
		$file = $_POST['file-name'];
		$fullPath = "$path/$file";
		$sql = "DELETE FROM tbllesson WHERE LessonID= $file";

		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if ($conn->query($sql) === TRUE) {
			echo "Dữ liệu đã được xóa";
		} else {
			echo "Lỗi delete: " . $conn->error;
		}
	}
}
?>
<!--update-->
<?php
if(isset($_POST['action'])){
  $action = $_POST['action'];
  $pname = $_FILES["file"]["name"];
   #temporary file name to store file
   $tname = $_FILES["file"]["tmp_name"];
        
   #upload directory path
  $uploads_dir = 'fileLesson';
  #TO move the uploaded file to specific location
  move_uploaded_file($tname, $uploads_dir.'/'.$pname);
	if($action =='update-file' && isset($_POST['paths'])&& isset($_POST['file-names'])){
		$paths = $_POST['paths'];
    $files = $_POST['file-names'];
    $fullPaths = "$paths/$files";
    $sql = "UPDATE tbllesson SET FileLocation='$pname' WHERE ExerciseID='$files'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
	}
								  
			  
  }


?>        
</body>