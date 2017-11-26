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
            <h1>Login to post a <span>Blog</span></h1>
          

<br><br>
<hr>


<style type="text/css">
 form{
    width:600px;
    margin-left:200px;
    margin-top:30px;
    padding:30px;
 }
</style>
<form method="post">
<label><font size="5" color="white">username:</font><input type="text" name="name"></label>
<br/><br/><br>
<label><font size="5" color="white">password:</font><input type="password" name="pw"></label>
<br/><br/>
<button type="submit" name="submit"><font size="4" color="black">login</font></button>
<a href="register.php"><font size="4" >register</font></a>
</form>

<?php 
$link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'test');
if (!$link){
    echo"<script>alert('数据库连接错误')</script>";
}else {
    if (isset($_POST['submit'])){
	$mdpw=md5($_POST['pw']);
        $query = "select * from user where name = '{$_POST['name']}' and password = '{$mdpw}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
	
	session_start();
	$row = mysqli_fetch_array($result);
	$_SESSION['user']=$row['name'];
        header("Location:index.php");
        }
	else
	{
		echo"<script>alert('账户或密码错误')</script>";
	}
    }
}
?>

    
	Copyright ? 2017 <a href="#">Simon</a> 

</body>
</html>


