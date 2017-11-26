<a href="index.php"><B>index</B></a>
<a href="add.php"><B>add blog</B></a>
<a href="login.php"><B>login</B></a>
<a href="logout.php"><B>logout</B></a>
<br><br>
<form action="" method="get" style='align:"right"'>
    <input type="text" name="keys" >
    <input type="submit" name="subs" >
</form>
<hr>

<?php
session_start();
if(isset($_SESSION['user']))
{

$user=$_SESSION['user'];
echo "logged as ".$user;
}
else
{
echo "未登陆";
}

include("conn.php"); //引入连接数据库
    
    if (!empty($_GET['keys'])) {
        $key = $_GET['keys'];
        $w = " title like '%$key%'";

    }else{
        $w=1;
    }

    $sql ="select * from blog where $w order by id desc limit 5";
    $query = mysql_query($sql);
    
    while ($rs = mysql_fetch_array($query)) {

    $sqls ="select * from comment where pid = ".$rs['id'];
    //echo $sqls;
    $querys = mysql_query($sqls);
    //$rss = mysql_fetch_array($querys)
    //echo $rss['comment'];
?>
<h2>title: <a href="view.php?id=<?php echo $rs['id']; ?>"><?php echo $rs['title']; ?></a>
    | <a href="edit.php?id=<?php echo $rs['id']; ?>">edit</a> 
    | <a href="del.php?id=<?php echo $rs['id']; ?>">delete</a> 
    | <a href="comment.php?id=<?php echo $rs['id']; ?>">comment</a> |
</h2>
<li>date: <?php echo $rs['date']; ?>  hits: <?php echo iconv_substr($rs['hits'],0,30,"gbk"); ?> owner: <?php echo $rs['user']; ?></li>
<!--截取内容展示长度-->
<p>contents:</p>
<p><?php echo iconv_substr($rs['contents'],0,30,"gbk"); ?></p>  

<?php 
$count=0;
while ( $rss = mysql_fetch_array($querys)) {
?>
<p>comments:<?php $count=$count+1; echo $count;?> from <?php if ($rss['user']==NULL) {echo "visitor";} else {echo $rss['user'];} ?></p>
<p><?php echo iconv_substr($rss['comment'],0,30,"gbk"); ?></p>  

<?php

};

?>
<hr>

<?php

};

?>