<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Blog</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>

<div id="templatemo_header">
            
    <div id="site_title">
        
        <a href="#">My Blog</a>
        
    </div> <!-- end of site_title -->
    
   <div id="header_right">
    
    	<a href="#"><img src="images/templatemo_twitter.png" alt="twitter" /></a><a href="#"><img src="images/templatemo_rss.png" alt="rss" /></a>
        
        <div id="newsletter_box">
       	  <form action="#" method="get">
              <input type="text" id="user" name="user" class="newsletter_email" value="Enter your email address"  onfocus="clearText(this)" onblur="clearText(this)" />
            <input style="font-weight: bold;" type="submit" name="submit" id="submit" value="" />
            </form>
        </div>
    
   </div>
    
    <div class="cleaner"></div>
    
</div> <!-- end of header -->

<div id="templatemo_menu_wrapper">
	
    <div id="templatemo_menu">
        <ul>
	    <li><a href="index.php"><span></span>Home</a></li>
	    <li><a href="add.php"><span></span>Add Blog</a></li>
	    <li><a href="myblog.php"><span></span>My Blog</a></li>
	    <li><a href="login.php"><span></span>Login</a></li>
	    <li><a href="logout.php">Logout</a></li>
	    <li><a href="Russian.html">Russian</a></li>
            <li><a href="weather.php">weather</a></li>
        </ul>    	
	</div>
</div> <!-- end of templatemo_menu -->

<Br></Br>

<div id="templatemo_main"> <span class="tm_bottom"></span>


<div id="templatemo_content">
<Br></Br> 
    	<div class="content_box">
            <h1>Register to post your <span>Blog</span></h1>
          

<br><br>
<hr>


<style type="text/css">
 form{
    width:300px;
    background-color:#000000;
    margin-left:250px;
    margin-top:30px;
    padding:30px;
 }
 button{
    margin-top:20px;
 }
</style>
<form method="post">
<label><font size="4" color="white">username:<br><input type="text" name="name"></label>
<br/><br/>
<label>password:<br><input type="password" name="pw"></label>
<br/><br/>
<label>confirm password:</font><input type="password" name="repw"></label>
<button type="submit" name="submit">register</button>
</form>

<?php 
$link = mysqli_connect('localhost', 'root', 'root', 'test');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else {
    if (isset($_POST['submit'])){
        if ($_POST['pw'] == $_POST['repw']){
    $mdpw=md5($_POST['pw']);
    $query = "insert into user (name,password) values('{$_POST['name']}','{$mdpw}')";
    $result=mysqli_query($link, $query);
    echo "<script>alert('注册成功')</script>";
    header("Location:login.php");
        }else {
            echo "<script>alert('两次输入密码不一致！')</script>";
        }
    }
}
?>

    
	Copyright ? 2017 <a href="#">Simon</a> 

</body>
</html>








