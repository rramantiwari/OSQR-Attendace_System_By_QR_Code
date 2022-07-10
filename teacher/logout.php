<!-- Logout teacher and destroy all session -->
<?php
session_start();
unset($_SESSION['TEACHER_ID']);
unset($_SESSION['TEACHER_TABLE']);
header('Location:/osqr');
?>