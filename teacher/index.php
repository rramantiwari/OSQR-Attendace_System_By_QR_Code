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
    <title>Welcome Teacher - OSQR</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    .he{
        font-size:1.2rem;
        font-weight:600;
        color:#fff !important;
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
    .myicon{
        font-size:3rem;
        margin-top: 0.5rem;
        color: #fff;
    }
    .mcard{
        cursor: pointer;
    }
    #qrcode img{
        width: 200px !important;
        height: 200px;
        margin: 1rem auto;
        width: 100%;
    }
    .col-md-4 a{
        text-decoration: none;
    }
    .mySelect{
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 2px solid black;
    border-radius: 8px;
    }
    </style>


</head>
<body>
<?php include "header.php" ;?>

<div style="width:100%;height:100vh;background:#e7e7e7;">
<!-- Write Code Here-->
<div class="container p-4">
<div class="card p-3 mt-4">
<h3>Welcome <strong class="text-success"><?php echo $tname; ?></strong></h3>
</div>
<div class="row gy-4 mt-4">
<div class="col-md-4">
    <div onclick="showModal()" class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #29b8ff, #f36f08);">
            <span><i class="fas fa-qrcode myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">Generate Session</h5>
        </div>
    </div>
    <div class="col-md-4">
        <a href="/osqr/teacher/student-manager.php">
    <div class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #ee5b5b, #3bffed);">
            <span><i class="fa  fa-user-plus myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">ADD Student</h5>
        </div>
</a>
    </div>
    <div class="col-md-4">
    <a href="/osqr/teacher/student-manager.php?stu_all=1&stu_remove=1">
    <div class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #ee5bbc, #2538d9);">
            <span><i class="fa  fa-user-times myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">Update/Delete Student</h5>
        </div>
</a>
    </div>
    <div class="col-md-4">
    <a href="/osqr/teacher/att.php">
    <div class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #5bbdee, #d9c925);">
            <span><i class="fa  fa-user-edit myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">Attendance</h5>
        </div>
    </a>
    </div>
    <div class="col-md-4">
    <a href="/osqr/teacher/student-manager.php?stu_all=1">
    <div class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #86ee5b, #d92556);">
            <span><i class="fa fa-users myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">Total Student</h5>
        </div>
    </a>
    </div>

    <div class="col-md-4">
    <div class="card text-center px-4 py-2 mcard" style="background: linear-gradient(45deg, #ee5b69, #2588d9);">
            <span><i class="fa  fa-user-tie myicon"></i></span>
            <h5 style="margin-top: 1rem;color: #fff;">Performanace</h5>
        </div>
    </div>
</div>

<!--END HERE MAIN DIV-->
</div>
<?php 

if(isset($_GET['today_class'])){
    $cmsg="";
   $hasclass=false;
   $style="display:block;";
    $tc=$_GET['today_class'];
    if($tc==0){
        $cmsg=$_GET['cmsg'];
    }else{
        $hasclass=true;
    }
}
?>
<!--START modal for display qrcode in popup -->
<div class="modal" id="modal" tabindex="-1" style="<?php echo $style;?>background: #949191b0;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="hideModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php 
      $date = date("Y/m/d");
      $nameOfDay = date('l', strtotime($date));
      if(!$hasclass){
          echo "<h2 class='m-4'>$cmsg</h2>";
      }
          if($hasclass){?>
      <div class="modal-body">
          
          <select class="mySelect">
              <option value="<?php echo $nameOfDay;?>"><?php echo $nameOfDay;?></option>
          </select>
          <select class="mySelect" id="subopt" onchange="getSubject()">
    <?php
    $sql="SELECT * from subjects where subject_teacher=$tid AND subject_day='$nameOfDay'";
    $res=mysqli_query($conn,$sql) or die("Failed to connect");
    while($r=mysqli_fetch_assoc($res)){
        echo '<option value="'.$r['subject_name'].'">'.$r['subject_name'].'&nbsp; '.$r['subject_time'].'</option>';
    }
    ?>
          </select>
      <div id="qrcode"></div>
      </div>
      <div class="mymfooter">
        <button type="button" onclick="generateQR(0)" style="margin-left:1rem;margin-bottom: 1rem;" class="btn btn-primary">Generate QR</button>
        <button type="button" id="showtime" style="margin-left:1rem;margin-bottom: 1rem;display:none;" class="btn btn-outline-danger">Expire in : 00:00</button>
      </div>
      <?php }?>
    </div>
  </div>
</div>
<!--END modal for display qrcode in popup -->
<script src="../assets/js/bootstrap.bundle.js"></script>    
<script src="../assets/js/qrcode.js"></script>

<script>
var url='/osqr/student/attendance.php?generate_by=<?php echo $tid;?>&today_att=<?php echo $nameOfDay?>';
function DisplayCurrentTime() {
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        time = hours + ":" + minutes;
        return time;
    };
function generateQR(val){
    url+="&generate_time="+DisplayCurrentTime();
    url+="&subject="+getSubject();
    console.log(url);
var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: url,
	width: 128,
	height: 128,
	colorDark : "#000",
	colorLight : "#fff",
	correctLevel : QRCode.CorrectLevel.H
});
expireQRCode(qrcode);
if(val==1){
    qrcode.clear();
}
}
    function showModal(){
        document.getElementById('modal').style.display="block";
        getDay();
    }
    function hideModal(){
        document.getElementById('modal').style.display="none";
    }

function getDay(){
    var days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    const d = new Date();
    window.location.href="/osqr/teacher/teacher_request.php?isclass="+days[d.getDay()-1]+"&tid=<?php echo $tid;?>";
}

function getSubject(){
  let option=document.getElementById('subopt').value;
  return option;
}

//Expire Qrcode after 3 minute

function expireQRCode(_ref){

var time= 180;   //SET Total time in seconds
var min=02;       //Set (total_minute-minute) in two digit for showing time
var sec=59;       //Set the seconds of first minute;

var s= setInterval(function(e){
if(time==1){
clearInterval(s);
//using qrcode.js inbuilt method for deleting qrcode
_ref.clear();
window.location.href="/osqr/teacher/";
}
else{
    if(sec<=60){
if(sec==0){
sec=59;min--;
}
let timebtn=document.getElementById("showtime");
timebtn.style.removeProperty('display');
timebtn.innerText="Expire in = "+min+" : "+sec;
sec--;
}
}time--;},1000);}






</script>
</body>
</html>