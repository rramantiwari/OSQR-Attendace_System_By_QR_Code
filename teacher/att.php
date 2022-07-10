<?php ob_start(); ?>

<?php session_start(); 
include "../include/config.php";
?>

<?php

$tid=$_SESSION['TEACHER_ID'];

$sql="SELECT * from teacher where user_id=$tid";
$result=mysqli_query($conn,$sql) or die("Some error Occured");
$alldetail=mysqli_fetch_assoc($result);
$tname=$alldetail['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager - OSQR</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <style>
      body{overflow-x: hidden;}
    .he{
        font-size:1.2rem;
        font-weight:600;
        color:#fff !important;
    }
    .form-container{
      width: 70%;
      background: #fff;
      padding:2rem;
      border-radius: 20px;
      margin:0px auto;
      border: 2px solid gray;
    }

    .form-container-2{
      width: 100%;
      background: #fff;
      padding:2rem;
      border-radius: 20px;
      margin:0px auto;
      border: 2px solid gray;
    }
    .branch-selection{
      width: 100%;
      padding:.5rem;
    }
    .input-custom{
      padding:.5rem;
    }
    .student-link{
      border: 2px solid gray;
      margin: 0px auto;
      width: 85%;
      background: #fff;
      border-radius: 20px;
    }
    .student-text li{
    color: #0303f7;
    font-size: 1.2rem;
    }
    .student-text li a{
      text-decoration: none;
    }
    .myLink{
      text-decoration: none;
      color: #fff;
    }
    .mylink:hover{
      color: #ffffff;
    }
    </style>
</head>
<body>
<?php include "header.php" ;?>

<div style="width:100%;height:100vh;background:#e7e7e7;">
<!-- Write Code Here-->
<h1 class="text-center p-4">Todays Attendance</h1>
<div class="row gy-3">

<div class="col-md-2">

</div>

<div class="col-md-9">
  <?php 
  echo '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Student Name</th>
      <th scope="col">Subject Name</th>
    </tr>
  </thead><tbody>
  ';
// REtrive all student detail from database
$counter=1;
$sql ="SELECT * from demo_att";
$res=mysqli_query($conn,$sql) or die("Failed to retrive data");
while($s=mysqli_fetch_assoc($res)){
    $id=$s['att_by'];
    $sub=$s['subject_name_a'];
    $sw="SELECT user_name from student where user_id=$id";
    $name=mysqli_query($conn,$sw) or die("Failed to load");
    $name=mysqli_fetch_assoc($name)['user_name'];
    echo '
<tr>
<th scope="row">'.$counter.'</th>
<td>'.$name.'</td>
<td>'.$sub.'</td>
</tr>
';
$counter++;
}
echo '</tbody></table>';
  ?>

      </div>
    </div>
  </div>
</div>
<!--END modal for updating student -->
<script src="../assets/js/bootstrap.bundle.js"></script>   
</body>
</html>