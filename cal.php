<?php 
/* 
* php 输出日历程序 
*/ 
header("Content-type: text/html;charset=utf-8"); 
$year=(!isset($_GET['year'])||$_GET['year']=="")?date("Y"):$_GET['year']; 
$month=(!isset($_GET['month'])||$_GET['month']=="")?date("n"):$_GET['month']; 
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
    $FontColor="black"; 
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