<?php 
/* 
* php ����������� 
*/ 
header("Content-type: text/html;charset=utf-8"); 
$year=(!isset($_GET['year'])||$_GET['year']=="")?date("Y"):$_GET['year']; 
$month=(!isset($_GET['month'])||$_GET['month']=="")?date("n"):$_GET['month']; 
$curUrl=$_SERVER['PHP_SELF']; 
 
if($year<1971){ 
  echo "����!"; 
  echo "<BR>"; 
  echo "<a href=",$curUrl,">Back</a>"; 
  exit(); 
} 
?> 
<table width="200" border="1" cellspacing="0" cellpadding="0" bordercolor="#E7E7E7" style="font-size:12px;" align="center"> 
<tr align="center"><td colspan="2"> 
<?php 
//<-------���·ݳ���1��12ʱ�Ĵ���;��ʼ-------> 
if($month<1){ 
  $month=12; 
  $year-=1; 
} 
if($month>12){ 
  $month=1; 
  $year+=1; 
} 
//<-------���·ݳ���1��12ʱ�Ĵ���;����-------> 
//<---------��һ��,��һ��,����,���µ����Ӵ��������;��ʼ---------> 

?> 
</td><td colspan="3"><?php echo $year.".".$month."";?> 
</td><td colspan="2"> 
</td></tr> 

<tr align=center><td><font color="red">SUN</font></td><td>MON</td><td>TUE</td><td>WED</td><td>THU</td><td>FRI</td><td>SAT</td></tr><tr> 
<?php 
$d=date("d"); 
$FirstDay=date("w",mktime(0,0,0,$month,1,$year));//ȡ���κ�һ���µ�һ�������ڼ�,���ڼ���һ�����ɱ���ĵڼ���ʼ 
$bgtoday=date("d"); 
function font_color($month,$today,$year){//���ڼ����������������ɫ 
  $sunday=date("w",mktime(0,0,0,$month,$today,$year)); 
  if($sunday=="0"){ 
    $FontColor="red"; 
  }else{ 
    $FontColor="black"; 
  } 
  return $FontColor; 
} 
function bgcolor($month,$bgtoday,$today_i,$year){//���ڼ��㵱�յı�����ɫ 
  $show_today=date("d",mktime(0,0,0,$month,$today_i,$year)); 
  $sys_today=date("d",mktime(0,0,0,$month,$bgtoday,$year)); 
  if($show_today==$sys_today){ 
  $bgcolor="bgcolor=#6699FF"; 
  }else{ 
  $bgcolor=""; 
  } 
  return $bgcolor; 
} 
function font_style($month,$today,$year){//���ڼ���������������� 
  $sunday=date("w",mktime(0,0,0,$month,$today,$year)); 
  if($sunday=="0"){ 
    $FontStyle="<strong>"; 
  }else{ 
    $FontStyle=""; 
  } 
  return $FontStyle; 
} 
for($i=0;$i<=$FirstDay;$i++){//��for�������ĳ���µ�һ��λ�� 
  for($i;$i<$FirstDay;$i++){ 
    echo "<td align=center> </td>\n"; 
  } 
  if($i==$FirstDay){ 
    echo "<td align=center ".bgcolor($month,$bgtoday,1,$year)."><font color=".font_color($month,1,$year).">".font_style($month,1,$year)."1</font></td>\n"; 
    if($FirstDay==6){//�ж�1���Ƿ������� 
      echo "</tr>"; 
    } 
  } 
} 
$countMonth=date("t",mktime(0,0,0,$month,1,$year));//ĳ�µ������� 
for($i=2;$i<=$countMonth;$i++){//�����1�Ŷ�λ,���2��ֱ����β�����к��� 
  echo "<td align=center ".bgcolor($month,$bgtoday,$i,$year)."><font color=".font_color($month,$i,$year).">".font_style($month,$i,$year)."$i</font></td>\n"; 
  if(date("w",mktime(0,0,0,$month,$i,$year))==6){//�жϸ����Ƿ������� 
    echo "</tr>\n"; 
  } 
} 
?> 
</table>