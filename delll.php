<a href="index.php"><B>index</B></a>
<a href="add.php"><B>add blog</B></a>
<hr>


<?php
    
    include("conn.php"); //引入连接数据库
//获取数据库表数据
if (!empty($_GET['id'])) {
    $edit = $_GET['id'];
    $sql = "select * from blog where id='$edit'";
    $query = mysql_query($sql);
    $rs = mysql_fetch_array($query);
}
session_start();
if (!isset($_SESSION['user']))
{
	die("未登录");
}
if ($rs['user']!=$_SESSION['user'])
{
	die("没有权限");
}
    if (!empty($_GET['id'])) {
        $del = $_GET['id'];  //删除blog
        $sql= "delete from blog where id='$del' ";
        mysql_query($sql);
        echo "delete success!";

    }

?>