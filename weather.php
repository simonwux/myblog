

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
            <h1>Read the <span>Weather Report</span></h1>
          

<br><br>
<hr>
<font size="3" color="white">
<?php
	$str =file_get_contents("http://v.juhe.cn/weather/index?cityname=%E5%8C%97%E4%BA%AC&dtype=json&format=&key=75c16ab4282792bbd5bad40c97bec5ed");  
//22:50 2017/6/19	$arr =json_decode($str,TRUE);         
  	$arr = json_decode($str, true);
   	//print_r($arr);
	
	echo ''.$arr['result']['today']['week'];
	echo '<br><br>';
	echo '今日温度：'.$arr['result']['today']['temperature'];
	echo '<br><br>';
	echo '今日天气：'.$arr['result']['today']['weather'];
	echo '<br><br>';echo '今日风向：'.$arr['result']['today']['wind'];
	
	echo '<br><br>';echo '城市：'.$arr['result']['today']['city'];
	echo '<br><br>';echo '今日穿着建议：'.$arr['result']['today']['dressing_advice'];
	echo '<br><br>';
	echo '未来天气:';
	echo '<br><br>';
	foreach($arr['result']['future'] as $val)  
    	{  
       	    echo $val['date']."<br/>";  
    	    echo "天气：{$val['weather']}<br/>";  
            echo "风向：{$val['wind']}<br/>";  
            echo "温度：{$val['temperature']}<br/><br />";  
    	}  
	
?>
</font>
 <br><br>   
	Copyright ? 2017 <a href="#">Simon</a> 

</body>
</html>


