<a href="index.php"><B>index</B></a>
<a href="add.php"><B>add blog</B></a>
<hr>


<?php
    
    include("conn.php"); //�����������ݿ�
//��ȡ���ݿ������
if (!empty($_GET['id'])) {
    $edit = $_GET['id'];
    $sql = "select * from blog where id='$edit'";
    $query = mysql_query($sql);
    $rs = mysql_fetch_array($query);
}
session_start();
if (!isset($_SESSION['user']))
{
	die("δ��¼");
}
if ($rs['user']!=$_SESSION['user'])
{
	die("û��Ȩ��");
}
    if (!empty($_GET['id'])) {
        $del = $_GET['id'];  //ɾ��blog
        $sql= "delete from blog where id='$del' ";
        mysql_query($sql);
        echo "delete success!";

    }

?>