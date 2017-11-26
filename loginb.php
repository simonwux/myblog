<style type="text/css">
 form{
    width:300px;
    background-color:#EEE0E5;
    margin-left:300px;
    margin-top:30px;
    padding:30px;
 }
</style>
<form method="post">
<label>username:<input type="text" name="name"></label>
<br/><br/>
<label>password:<input type="password" name="pw"></label>
<br/><br/>
<button type="submit" name="submit">login</button>
<a href="register.php">register</a>
</form>

<?php 
$link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'test');
if (!$link){
    echo"<script>alert('数据库连接错误')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where name = '{$_POST['name']}' and password = '{$_POST['pw']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){

	$row = mysqli_fetch_array($result);
        session_start();
	$_SESSION['user']=$row['name'];
        header("Location:index.php");
        }
	else
	{
		echo"<script>alert('账户或密码错误')</script>";
	}
    }
}
?>