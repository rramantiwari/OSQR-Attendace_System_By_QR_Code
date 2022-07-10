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
$branch_head=$alldetail['branch_teacher'];
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

<div style="width:100%;background:#e7e7e7;">
<!-- Write Code Here-->
<h1 class="text-center p-4">Manage Students</h1>
<div class="row gy-3">

<div class="col-md-2">

</div>

<div class="col-md-9">
  <?php 
  if(isset($_GET['upd'])){
    echo '
    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
    Student Update Successfully
  <button onclick="dismiss(this)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';
   }
 if(isset($_GET['dmsg'])){
  echo '
  <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
  '.$_GET['dmsg'].'
<button onclick="dismiss(this)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  ';
 }
  if(isset($_GET['stu_all'])){
  echo '<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">Student Password</th>
      <th scope="col">Student Branch</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead><tbody>
  ';
// REtrive all student detail from database

$sql="SELECT branch_name from branch where id=$branch_head";
$bname=mysqli_query($conn,$sql) or die("Failed to load data");
$bname=mysqli_fetch_assoc($bname)['branch_name'];

$sql ="SELECT * from student where user_branch=$branch_head";

$result=mysqli_query($conn,$sql) or die("Failed to connect the server");
$counter=1;
while($rw=mysqli_fetch_assoc($result)){
  $bid=$rw['user_branch'];
  $sql="SELECT branch_name from branch where id=$bid";
  $r=mysqli_query($conn,$sql) or die("Failed to retrive branch");
  $brname=mysqli_fetch_assoc($r)['branch_name']; 
echo '
<tr>
<th scope="row">'.$counter.'</th>
<td>'.$rw['user_name'].'</td>
<td>'.$rw['user_email'].'</td>
<td>'.$rw['user_password'].'</td>
<td>'.$brname.'</td>
<td><button class="btn btn-success"><a class="myLink" href="/osqr/teacher/student-manager.php?update=1&stu_all=1&stuid='.$rw['user_id'].'">Update</button></td>
<td><button class="btn btn-danger"><a class="myLink" href="/osqr/teacher/teacher_request.php?delete=1&stu_all=1&stuid='.$rw['user_id'].'">Delete</button></td>
</tr>
';
$counter++;
}
echo '</tbody></table>';
  }else{
  ?>
<form action="teacher_request.php" method="post" class="form-container">
<?php
  if(isset($_GET['msg'])){
    echo '
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
    '.$_GET['msg'].'
  <button onclick="dismiss(this)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    ';
  }
?>
  <div class="mb-3">
    <label for="name" class="form-label">Student Name</label>
    <input type="text" class="form-control input-custom" id="name" name="name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Email</label>
    <input type="email" class="form-control input-custom" name="email" id="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Student Password</label>
    <input type="password" class="form-control input-custom" name="password" id="password" required>
  </div>

  <div class="mb-3">
    <label for="branchSelect" class="form-label d-block">Student Branch</label>
    <select name="branchSelect" id="branchSelect" class="branch-selection">

      <?php

      # START --->  Retrive all Branch dynamically from db
      
      $sql="SELECT * from branch";
      $getBranch=mysqli_query($conn,$sql) or die("Failed to Load Branch");
      while($opt=mysqli_fetch_assoc($getBranch)){
        echo '<option value="'.$opt['id'].'">'.$opt['branch_name'].'</option>';
      }

      # END --->  Retrive all Branch dynamically from db
    ?>
    </select>
  </div>
  <button type="submit" name="addStudent" class="btn btn-primary">Add Student</button>
</form>
   <?php }?>

</div>
</div>

<!--END HERE MAIN DIV-->
</div>
<?php if(isset($_GET['update'])){
 $show="display:block;";
}
?>
<!--START modal for updating student -->

<div class="modal" id="modal" tabindex="-1" style="<?php echo $show;?>background: #1d1d1e5e;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Student Details</h5>
        <button type="button" onclick="hideModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- create form here -->
        <?php
        $name="";
        $email="";
        if(isset($_GET['update'])){
        $sid=$_GET['stuid'];
    $sql="SELECT * from student where user_id=$sid";
    $res=mysqli_query($conn,$sql) or die("Failed to load student details");
    $a=mysqli_fetch_assoc($res);
    $name=$a['user_name'];
    $email=$a['user_email'];
        }
?>
        <form action="teacher_request.php" method="post" class="form-container-2">
  <div class="mb-3">
    <label for="name" class="form-label">Student Name</label>
    <input type="text" class="form-control input-custom" id="name" name="name" value="<?php echo $name;?>" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Email</label>
    <input type="email" class="form-control input-custom" name="email" id="email" value="<?php echo $email;?>" required>
  </div>
  <input type="hidden" name="sid" value="<?php echo $sid; ?>">
  <div class="mb-3">
    <label for="branchSelect" class="form-label d-block">Student Branch</label>
    <select name="branchSelect" id="branchSelect" class="branch-selection">

      <?php

      # START --->  Retrive all Branch dynamically from db

      $sql="SELECT * from branch";
      $getBranch=mysqli_query($conn,$sql) or die("Failed to Load Branch");
      while($opt=mysqli_fetch_assoc($getBranch)){
        echo '<option value="'.$opt['id'].'">'.$opt['branch_name'].'</option>';
      }

      # END --->  Retrive all Branch dynamically from db
    ?>
    </select>
  </div>
  <button type="submit" name="updateStudent" class="btn btn-danger">Update Student</button>
</form>

      </div>
    </div>
  </div>
</div>
<!--END modal for updating student -->
<script src="../assets/js/bootstrap.bundle.js"></script>   
<script>
  function hideModal(){
    document.getElementById('modal').style.display="none";
  }

  function dismiss(val){
    val.style.display="none";
  }
</script>
</body>
</html>