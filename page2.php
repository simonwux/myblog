<?php
session_start();
if(isset($_SESSION['user']))
{
echo "���ݵ�session����var1��ֵΪ��".$_SESSION['user'];
}
else
{
echo "δ����";
}

?>
