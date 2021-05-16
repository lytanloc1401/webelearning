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
<link rel="stylesheet" type="text/css" href="CSS/FormIndex.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/Index.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i></button>
              <div id="myDropdown" class="dropdown-content">
                <a class="dropdown-item" href="https://www.facebook.com/NguyenQuangHuy.isme/">Nguyen Quang Huy</a>
                <a class="dropdown-item" href="https://www.facebook.com/LyTanLoc.is.me/">Ly Tan Loc</a>
                <a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100024755624329">To Thi Bich Tuyen</a>
              </div>
            </div>
            <h5 class="f2"href="#">Classroom</h5>
       
              


      <ul class="list-inline">
        <li class="list-inline-item">
          <button class="add btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </button>
        </li>
        <li class="list-inline-item">
          <a class="na" href="../FormLogout.php">
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
<div class="container">

    <!-- dòng phải là con trực tiếp của container, mang class row -->
    <div class="row">

<?php
  $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
  $db->query("set names utf8");
	//thuc hien cau truy van
?>  

<?php
  $user = $_SESSION['user'];
  $sql2 = "SELECT USERID FROM tblusers WHERE UEMAIL  = '$user' ";
  $query2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($query2);
  $Stuid= $row2["USERID"];
  $course = $db->query("select SubjectID, USERID,Subjects,Teacher,ROOM from tblsubtea where USERID='$Stuid'");
  foreach ($course as $item) {
    
    // echo "<pre>";
    // print_r ($item);
    // echo "</pre>";?>
    
            <div class="col-lg-3 col-6">
            <div class="card shadow mt-5">
                <div class="card-body">
                <i onclick="update('<?php echo $item['SubjectID'];  ?>')" class="fa fa-edit action" data-toggle="modal" data-target="#confirm-rename" ></i>
                <i onclick="updatedeleteFiledialog('<?php echo $item['SubjectID'];  ?>')" class="fa fa-trash action" data-toggle="modal" data-target="#confirm-delete"></i>
                  <h4 class="headericon"><?php echo $item['Subjects'];  ?></h4>
                  <p class="h3Over"><?php echo $item['Teacher']; ?></p> </a>
                  <p class="h3Over" ><?php echo $item['SubjectID']; ?></p> </a>
                  <p class="h3Over" ><?php echo $item['ROOM']; ?></p> </a>
                  <img class="mw-100" src="../image/avatarclass.png" alt="avatar"></a>
                  <p></p>
                <div id="ctn">
                  <button class="learn-more">
                    <span class="circle" aria-hidden="true">
                      <span class="icon arrow"></span>
                    </span>
                    <a  href="lesson/FormLesson.php?subID=<?php echo $item['SubjectID']; ?>" class="button-text">Learn More</a>
                  </button>
                </div>
                </div>  
            </div>
            </div>


<?php  }?>

      <!-- cột 1 -->

</div>
<div class="modal" tabindex="-1" id="addCourseModal" role="dialog">
  <form class="modal-dialog" role="document" action="Index.php" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="course_name" placeholder="Course's name"/>
          </div>
          <div class="form-group">
            <?php
              $db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
              $db->query("set names utf8");
              $tea= $_SESSION['user'];
              $course1 = "select FNAME ,Lname,UEMAIL from tblusers where UEMAIL='$tea'";
              $query5 = mysqli_query($conn, $course1); 
              $row5 = mysqli_fetch_assoc($query5);
              $teacher = $row5["FNAME"]. $row5["Lname"];
            ?>
            <input type="text" class="form-control" name="teacher" placeholder="Teacher" value="<?php echo $teacher; ?>"/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="ROOM" placeholder="ROOM"/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button name="create" type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
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
                <input name="name" type="text" placeholder="Nhập tên mới" value="" class="form-control"/>
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
							

<!-- create bảng-->
<?php	
 
      if (isset($_POST["create"])) 
      {
        $user=$_SESSION['user'];
  			//get form information
  			$id = uniqid(rand(),true);
  			$course_name = $_POST["course_name"];
        $teacher = $_POST["teacher"];
        $ROOM = $_POST["ROOM"]; 
			

  			//test
			  if ($course_name == "" || $teacher == "" || $ROOM == "") {
				   echo "please, enter your information";
  			}else{
  					// test account exist
  					$sql1 = "SELECT SubjectID,Subjects,Teacher FROM tblsubjects WHERE SubjectID  = '$id' ";
            $query1 = mysqli_query($conn, $sql1); 
            $sql2 = "SELECT USERID  FROM tblusers WHERE UEMAIL  = '$user' ";
            $query2 = mysqli_query($conn, $sql2);

					if(mysqli_num_rows($query1)  > 0){
						echo "subjects exist";
					}else{
	    				$sql = "INSERT INTO tblsubjects(
	    					SubjectID ,
	    					Subjects,
	    					Teacher,
                ROOM
	    					) VALUES (
	    					'$id',
	    					'$course_name',
	    					'$teacher',
                '$ROOM'
	    					)";
               mysqli_query($conn,$sql);

               $row2 = mysqli_fetch_assoc($query2);
               $Uid= $row2["USERID"];

               $sql3 =  "INSERT INTO tblsubtea(SubjectID,USERID,Subjects,Teacher,ROOM) VALUES ('$id','$Uid','$course_name','$teacher','$ROOM')";
               mysqli_query($conn,$sql3);
              }
									    
					
        }
        
      }

?>
<!-- delete-->

<?php

/*xoa*/
if(isset($_POST['action'])){
	$action = $_POST['action'];
	if($action =='delete-file' && isset($_POST['path'])&& isset($_POST['file-name'])){
		$path = $_POST['path'];
		$file = $_POST['file-name'];
    $fullPath = "$path/$file";
    $sql = "DELETE FROM tblsubtea WHERE SubjectID= $file";
    $sql1 = "DELETE FROM tblsubstu WHERE SubjectID= $file";
		$sql2 = "DELETE FROM tblsubjects WHERE SubjectID= $file";

		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
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
  $name = $_POST['name'];
	if($action =='update-file' && isset($_POST['paths'])&& isset($_POST['file-names'])){
		$paths = $_POST['paths'];
    $files = $_POST['file-names'];
    $fullPaths = "$paths/$files";
    $sql = "UPDATE tblsubjects SET Subjects='$name' WHERE SubjectID=$files";
    $sql1 = "UPDATE tblsubtea SET Subjects='$name' WHERE SubjectID=$files";
    $sql2 = "UPDATE tblsubstu SET Subjects='$name' WHERE SubjectID=$files";

    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
		}
								  
			  
  }


?>
</body>
</html>
