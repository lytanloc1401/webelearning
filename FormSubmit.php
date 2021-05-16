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
<link rel="stylesheet" type="text/css" href="CSS/submit.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="JS/FormHomeActivity.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container-fluid">
        <li class="nav-item">
        <a class="f1" href="FormHomeActivity.php">Home</a>
        </li>
        <a class="navbar-brand"></a>
    <ul class="nav navbar-nav navbar-right">           
        <li class="nav-item">
        <a class="f1" href="FormLogout.php">Logout</a>
        </li>
    </ul>
  </div>
</nav>
<h1><a class="f1" href="FormLesson.php?subID=<?php echo $_GET['subID'];?>">Lesson</a></h1>
<p>___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
<form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">
<div class="submit" >
    <label for="file">Upload File:</label>
    <input type="file" name="file"/>
    <div>
    <button id="idno" class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>Mark as done</button> 
</div>
</form>

</div>
<?php
if (isset($_POST["save"])) {
    //get form information
    $ID = uniqid(rand(),true);
    $ex = $_GET['subID'];
    $pname = $_FILES["file"]["name"];
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
    
      #upload directory path
    $uploads_dir = 'admin/Exercise/fileSubmit';
     #TO move the uploaded file to specific location
     move_uploaded_file($tname, $uploads_dir.'/'.$pname);
        

          //test
          if ($ID == "" || $ex == ""|| $pname == "" ) {
               echo "bạn vui lòng nhập đầy đủ thông tin";
          }else{
                  // test account exist
                  $sql1="SELECT * FROM tblsubmits WHERE SubmitID='$ID'";
                  $kt=mysqli_query($conn, $sql1);

                if(mysqli_num_rows($kt)  > 0){
                    echo "Tài khoản đã tồn tại";
                }else{
                    //thực hiện việc lưu trữ dữ liệu vào db
                    $sql = "INSERT INTO tblsubmits(
                        SubmitID,
                        ExerciseID,
                        Filesubmit
                        ) VALUES (
                        '$ID',
                        '$ex',
                        '$pname'
                        )";
                    // thực thi câu $sql với biến conn lấy từ file
           mysqli_query($conn,$sql);
                       echo "thành công";
                }
                                    
                
          }
}
?>         
</body>
</html>