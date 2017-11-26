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

<div id="templatemo_sidebar">
    	<div class="sidebar_box">
		<br><br><br><br>
            <div class="sb_content">
            	<a href="#" style="font-size:18px">Calender</a> <br><br>




		<?php 
/* 
* phpcal
*/ 

session_start();
$year=date("Y"); 
$month=date("n"); 
$curUrl=$_SERVER['PHP_SELF']; 
 
if($year<1971){ 
  echo "出错!"; 
  echo "<BR>"; 
  echo "<a href=",$curUrl,">Back</a>"; 
  exit(); 
} 
?> 
<table width="200" border="1" cellspacing="0" cellpadding="0" bordercolor="#E7E7E7" style="font-size:12px;" align="center"> 
<tr align="center"><td colspan="2"> 
<?php 
//<-------当月份超出1至12时的处理;开始-------> 
if($month<1){ 
  $month=12; 
  $year-=1; 
} 
if($month>12){ 
  $month=1; 
  $year+=1; 
} 
//<-------当月份超出1至12时的处理;结束-------> 
//<---------上一年,下一年,上月,下月的连接处理及输出;开始---------> 

?> 
</td><td colspan="3"><?php echo $year.".".$month."";?> 
</td><td colspan="2"> 
</td></tr> 

<tr align=center><td><font color="red">SUN</font></td><td>MON</td><td>TUE</td><td>WED</td><td>THU</td><td>FRI</td><td>SAT</td></tr><tr> 
<?php 
$d=date("d"); 
$FirstDay=date("w",mktime(0,0,0,$month,1,$year));//取得任何一个月的一号是星期几,用于计算一号是由表格的第几格开始 
$bgtoday=date("d"); 
function font_color($month,$today,$year){//用于计算星期天的字体颜色 
  $sunday=date("w",mktime(0,0,0,$month,$today,$year)); 
  if($sunday=="0"){ 
    $FontColor="red"; 
  }else{ 
    $FontColor="white"; 
  } 
  return $FontColor; 
} 
function bgcolor($month,$bgtoday,$today_i,$year){//用于计算当日的背景颜色 
  $show_today=date("d",mktime(0,0,0,$month,$today_i,$year)); 
  $sys_today=date("d",mktime(0,0,0,$month,$bgtoday,$year)); 
  if($show_today==$sys_today){ 
  $bgcolor="bgcolor=#6699FF"; 
  }else{ 
  $bgcolor=""; 
  } 
  return $bgcolor; 
} 
function font_style($month,$today,$year){//用于计算星期天的字体风格 
  $sunday=date("w",mktime(0,0,0,$month,$today,$year)); 
  if($sunday=="0"){ 
    $FontStyle="<strong>"; 
  }else{ 
    $FontStyle=""; 
  } 
  return $FontStyle; 
} 
for($i=0;$i<=$FirstDay;$i++){//此for用于输出某个月的一号位置 
  for($i;$i<$FirstDay;$i++){ 
    echo "<td align=center> </td>\n"; 
  } 
  if($i==$FirstDay){ 
    echo "<td align=center ".bgcolor($month,$bgtoday,1,$year)."><font color=".font_color($month,1,$year).">".font_style($month,1,$year)."1</font></td>\n"; 
    if($FirstDay==6){//判断1号是否星期六 
      echo "</tr>"; 
    } 
  } 
} 
$countMonth=date("t",mktime(0,0,0,$month,1,$year));//某月的总天数 
for($i=2;$i<=$countMonth;$i++){//输出由1号定位,随后2号直至月尾的所有号数 
  echo "<td align=center ".bgcolor($month,$bgtoday,$i,$year)."><font color=".font_color($month,$i,$year).">".font_style($month,$i,$year)."$i</font></td>\n"; 
  if(date("w",mktime(0,0,0,$month,$i,$year))==6){//判断该日是否星期六 
    echo "</tr>\n"; 
  } 
} 
?> 
</table>		


            </div>
        </div>
 </div>

	
<div id="templatemo_content">
<Br></Br> 
    	<div class="content_box">
            <h1>Make some <span>Comments</span></h1>
          

<br><br>
<hr>

<font size="5" color="white">
<?php
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
    echo  '<font size="5" color="white">'."   insert success!".'</font>';

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
