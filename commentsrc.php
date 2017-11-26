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
	    <li><a href="login.php"><span></span>Login</a></li>
	    <li><a href="logout.php">Logout</a></li>
	    <li><a href="Russian.html">Russian</a></li>
        </ul>    	
	</div>
</div> <!-- end of templatemo_menu -->

<Br></Br>

<div id="templatemo_main"> <span class="tm_bottom"></span>



	
<div id="templatemo_content">
<Br></Br> 
    	<div class="content_box">
            <h1>Make some <span>Comments</span></h1>
          

<br><br>
<hr>

<font size="5" color="white">
<?php
session_start();
if(isset($_SESSION['user']))
{
$user=$_SESSION['user'];
echo "logged as ".$user;
}
else
{
$user=NULL;
echo "Send Comments as a Visitor";
}
?>
</font>
<?php
include("conn.php"); //引入连接数据库

//获取数据库表数据
if (!empty($_GET['id'])) {
    $pid = $_GET['id'];
    //echo $pid;
}

if (!empty($_POST['sub'])) {
    $hid = $_POST['hid']; 
     //获取title表单内
    $con = $_POST['con'];      //获取contents表单内容
    $sql= "insert into comment values('$hid','$con','$user')";
    //echo $sql;
    mysql_query($sql);
    echo "insert success!";

}

?>
<br><br>
<form action="comment.php?id="."$pid" method="post">
    <input type="hidden" name="hid" value="<?php echo $pid;?>">
    <font size="6" color="white">comment:<br></font><br><br>
    <textarea style="width:550px;height:450px;font-size:25px" rows="5" cols="50" name="con"></textarea><br><br>
    <input type="submit" style="height:25px; font-size:17px;" name="sub" value="submit">
    
</form>

    
	Copyright ? 2017 <a href="#">Simon</a> 

</body>
</html>
