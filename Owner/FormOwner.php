<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: ../FormLogin.php');
    exit();
}
	require_once('../db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>TDTU Learing System</title>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSQTSi6uJra_mrOlMQ8ztytEkqnxcFDCUSj0w&usqp=CAU" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/FormHomeActivity.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../CSS/FormHomeActivity.css">
<link 
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
         integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

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
        <a class="navbar-brand"></a>
        <ul class="nav navbar-nav navbar-right">
		<li class="nav-item">
        <a class="nav-link" href="FormOwner.php">List Of teacher</a>
        </li>  
		<li class="nav-item">
        <a class="nav-link" href="ListStudent.php">List of Student</a>
        </li>  
      <li class="nav-item">
        <a class="nav-link" href="../FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container">
			<div class="row">

				<div class="col-sm-9" style="margin-top: 10px" >
				<div   class="wrap-content">
			    <form action="" Method="POST">  					
				<table id="example" class="datatable-1 table table-hover " cellspacing="0" style="font-size:12px" > 
				  <thead>
				  <?php

						$db = new PDO('mysql:host=localhost;dbname=db_elearning', 'root', '');
						$db->query("set names utf8");
						//thuc hien cau truy van
						?>
				  	<tr> 
					  <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Mobile</th> 
				  		<th>Email</th>
				  		<th width="10%">Action</th>  
					  </tr>
					  <?php
                            $course = $db->query('select USERID,Fname, Lname,DateOfBirth,MobileNo, UEMAIL from tblusers');
                            foreach ($course as $item) {
                              
                              // echo "<pre>";
                              // print_r ($item);
                              // echo "</pre>";?>  
                            <tr>
							  <th name="iddel"><?php echo $item['USERID'];  ?></th>
							  <th> <?php echo $item['Fname']. $item['Lname'];  ?> </th>
                              <th><?php echo $item['DateOfBirth'];  ?></th>
                              <th> <?php echo $item['MobileNo'];  ?> </th>
                              <th> <?php echo $item['UEMAIL'];  ?> </th>
							  <th>
								  <i onclick="update('<?php echo $item['USERID'];  ?>')" class="fa fa-edit action" data-toggle="modal" data-target="#confirm-rename" ></i>
                     			  <i onclick="updatedeleteFiledialog('<?php echo $item['USERID'];  ?>')" class="fa fa-trash action" data-toggle="modal" data-target="#confirm-delete"></i>		
							</th>
                            </tr>
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
                <input name="Fname" type="text" placeholder="Fname" value="" class="form-control"/>
				<input name="Lname" type="text" placeholder="Lname" value="" class="form-control"/>
				<input name="Mobile" type="text" placeholder="Mobile" value="" class="form-control"/>
				<input name="dateofbirth" type="text" placeholder="Date of birth" value="" class="form-control"/>
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
		$sql = "DELETE FROM tblusers WHERE USERID= $file";

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
  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Mobile = $_POST['Mobile'];
  $dateofbirth = $_POST['dateofbirth'];
	if($action =='update-file' && isset($_POST['paths'])&& isset($_POST['file-names'])){
		$paths = $_POST['paths'];
    $files = $_POST['file-names'];
    $fullPaths = "$paths/$files";
    $sql = "UPDATE tblusers SET FNAME='$Fname', Lname='$Lname',DateOfBirth='$dateofbirth', MobileNo='$Mobile' WHERE USERID='$files'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
	}
								  
			  
  }


?>
</body>

