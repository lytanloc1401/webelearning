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
<link rel="stylesheet" type="text/css" href="CSS/FormExercise.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/finalProjectWEB/CSS/FormHomeActivity.css">
<scriptlink rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
          <a class="dropdown-item" href="add.php">Exercises</a>
          <a class="dropdown-item" href="../lesson/add.php">Lession</a>  
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
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

				<div class="col-sm-9" style="margin-top: 10px" >
        <div  class="wrap-content" >
        <div class="module-head"> 
            <h1 class="headericon">List of Exercise <a href="add.php?subID=<?php echo $_GET['subID'];?>" class="btn btn-outline-primary">  <i class="fa fa-plus-circle fw-fa"></i> New</a> </h1> 
       		  <p></p>
       		</div> 
			    <form >  					
				<table id="example" class=" datatable-1 table table-hover" cellspacing="0" style="font-size:12px" >
				
				  <thead>
          <?php

            $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
            $db->query("set names utf8");
            //thuc hien cau truy van
            $user = $_SESSION['user'];
              $sql2 = "SELECT USERID FROM tblusers WHERE UEMAIL  = '$user' ";
              $query2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($query2);
              $Uid= $row2["USERID"];
            ?>
            <div class="container">
                      <ul class="responsive-table">
                        <li class="table-header">
                          <div class="col col-1">Number</div>
                          <div class="col col-2">Title</div>
                          <div class="col col-2">Lesson</div>
                          <div class="col col-2">Deadline</div>
                          <div class="col col-2">See Exercise</div>
                          
                        </li>

            <?php
               $Subid= $_GET['subID'];
              $course = $db->query("SELECT SubjectID,TEXT,  ExerciseID, LessonID, ExercisesDate from tblexercise where SubjectID = '$Subid'");
              foreach ($course as $item) { 
                // echo "<pre>";
                // print_r ($item);
                // echo "</pre>";?>
                <li class="table-row">
                          <div class="col col-1" ><?php echo $item['ExerciseID']; ?></div>
                          <div class="col col-2" ><?php echo $item['TEXT']; ?></div>
                          <div class="col col-2" ><?php echo $item['LessonID'];  ?></div>
                          <div class="col col-2" ><?php echo $item['ExercisesDate']; ?></div>
                          <div class="col col-2" >
                            <nav class="navbar">
                              <div class="container-fluid">
                                <a class="navbar-brand"></a>
                                  <ul class="nav navbar-nav navbar-right">    
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Action
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                          <i onclick="updatedeleteFiledialog('<?php echo $item['ExerciseID'];  ?>')" class="fa fa-trash action" data-toggle="modal" data-target="#confirm-delete"></i>
                                          <p></p>
                                          <i onclick="update('<?php echo $item['ExerciseID'];  ?>')" class="fa fa-edit action" data-toggle="modal" data-target="#confirm-rename" ></i>
                                          <a href="FormView.php?subID=<?php echo $item['ExerciseID'];?>">View</a> 
                                        </div>
                                    </li>
                                  </ul>
                              </div>
                            </nav>
                          </div>
                        </li>
              <?php  }?>		
				  </thead> 	
				</table>
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
				        <input name="lesson" type="text" placeholder="Nhập lesson mới" value="" class="form-control"/>
                <input id="datepicker" name="deadline" type="text" placeholder="Nhập deadline mới" value="" class="form-control"/>
            </div>
        
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
		$sql = "DELETE FROM tblexercise WHERE ExerciseID= $file";

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
  $lesson = $_POST['lesson'];
  $dead = $_POST['deadline'];
	if($action =='update-file' && isset($_POST['paths'])&& isset($_POST['file-names'])){
		$paths = $_POST['paths'];
    $files = $_POST['file-names'];
    $fullPaths = "$paths/$files";
    $sql = "UPDATE tblexercise SET LessonID='$lesson', ExercisesDate ='$dead' WHERE ExerciseID='$files'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
	}
								  
			  
  }


?>
</body>