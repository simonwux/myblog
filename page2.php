<?php
session_start();
if(isset($_SESSION['user']))
{
echo "传递的session变量var1的值为：".$_SESSION['user'];
}
else
{
echo "未定义";
}

?>
