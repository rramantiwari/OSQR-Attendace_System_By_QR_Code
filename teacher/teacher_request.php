<?php
ob_start();
session_start();

include "../include/config.php";
if(isset($_POST['addStudent'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $branch=$_POST['branchSelect'];
    $tid=$_SESSION['TEACHER_ID'];

    $sql="INSERT INTO `student`(`user_name`, `user_email`, `user_password`, `user_branch`,`added_by`) VALUES ('$name','$email','$pass','$branch','$tid')";

    $result=mysqli_query($conn,$sql) or die("Failed to add Data");

    if($result>0){
        header('Location:/osqr/teacher/student-manager.php?msg=Registration Successfully');
        die();
    }
    else{
        header('Location:/osqr/teacher/student-manager.php?msg=Invalid details');
        die();
    }
}




// This is for deleting student
if(isset($_GET['delete'])){
    $stuid=$_GET['stuid'];
    $sql="DELETE FROM `student` WHERE user_id=$stuid";
    $rs=mysqli_query($conn,$sql) or die("Failed to delete student");

    if($rs>0){
        header('Location:/osqr/teacher/student-manager.php?stu_all=1&dmsg=Student Deleted Successfully');
        die();
    }
    else{
        header('Location:/osqr/teacher/student-manager.php?stu_all=1&dmsg=Request not processed');
        die();
    }
}


if(isset($_POST['updateStudent'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $branch=$_POST['branchSelect'];
    $uid=$_POST['sid'];
    $sql="UPDATE `student` SET `user_name`='$name',`user_email`='$email',`user_branch`='$branch' WHERE user_id=$uid";
    $res=mysqli_query($conn,$sql) or die("Failed to update");

    header('Location:/osqr/teacher/student-manager.php?stu_all=1&upd=1');
    die();
}

if(isset($_GET['isclass'])){
    $day=$_GET['isclass'];
    $tid=$_GET['tid'];
    $sql="SELECT * from subjects where subject_teacher=$tid AND subject_day='$day'";
    // echo $sql;
    // die();
    $res=mysqli_query($conn,$sql) or die("Failed to load Teacher class");
    // echo mysqli_num_rows($res);
    // die();
    if(mysqli_num_rows($res)<=0){
        header('Location:/osqr/teacher/?today_class=0&cmsg=There is no class today');
    }else{
        header('Location:/osqr/teacher/?today_class=1');
    }
}

//Making student attandance
if(isset($_GET['subject_name'])){

 $s=$_GET['subject_name'];
 $ids=$_GET['astuid'];
 $sql="INSERT INTO demo_att(att_by,subject_name_a) VALUES('$ids','$s')";
 $res=mysqli_query($conn,$sql) or die("Failed to marked your attendance");
 header('Location:/osqr/student/?att=1');
 die();
}


?>