<?php
session_start();
$_SESSION['user']=NULL;
echo"<script>alert('�ѵǳ�')</script>";
header("Location:index.php");
?>