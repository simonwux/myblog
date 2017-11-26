<?php

@mysql_connect("127.0.0.1:3306","root","root") or die("mysql数据库连接失败");
@mysql_select_db("test")or die("db连接失败");
mysql_query("set names 'gbk'");

?>