<?php

@mysql_connect("127.0.0.1:3306","root","root") or die("mysql���ݿ�����ʧ��");
@mysql_select_db("test")or die("db����ʧ��");
mysql_query("set names 'gbk'");

?>