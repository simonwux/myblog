<?php
session_start();
$_SESSION['user']=NULL;
echo"<script>alert('ÒÑµÇ³ö')</script>";
header("Location:index.php");
?>