<?php ob_start();?>

<?php
include "include/config.php";
$user_type=$_POST['user_type'];
function getUserDetail($conn,$tblName,$arr){
 $a="ADMIN";$s="STUDENT";$t="TEACHER";
 $user_email=$arr['user_email'];
 $user_pass=$arr['user_password'];
 $sql="SELECT * from $tblName where user_email='$user_email' AND user_password='$user_pass'";
 $result=mysqli_query($conn,$sql) or die("Failed to connect");
 $keys=mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result)>0){
     session_start();
     if(strtoupper($tblName)==$a){
         $url=$host.'/OSQR/admin/';
         $_SESSION[$a.'_ID']=$keys['user_id'];
         $_SESSION[$a.'_TABLE']=$tblName;
         header('Location:'.$url);
         die();
     }
     else if(strtoupper($tblName)==$s){
        $url=$host.'/OSQR/student/';
        $_SESSION[$s.'_ID']=$keys['user_id'];
        $_SESSION[$s.'_TABLE']=$tblName;
        header('Location:'.$url);
        die();
     }
     else{
        $url=$host.'/OSQR/teacher/';
        $_SESSION[$t.'_ID']=$keys['user_id'];
        $_SESSION[$t.'_TABLE']=$tblName;
        header('Location:'.$url);
        die();
     }
 }
 else{
     $url=$host.'/OSQR?msg=Invalid+Details';
     header('Location:'.$url);
     die();
 }

}

if(isset($_POST['login']) && $user_type=="student"){
    getUserDetail($conn,"student",$_POST);
}

else if(isset($_POST['login']) && $user_type=="teacher"){
    getUserDetail($conn,"teacher",$_POST);
}

else if(isset($_POST['login']) && $user_type=="admin"){
    getUserDetail($conn,"admin",$_POST);
}
?>