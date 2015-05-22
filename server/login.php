<?php 
	// $username="admin";
	// $password="admin";
	$username=$_GET['username'];
	$password=$_GET['password'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("select * from admin where username ='$username' and password = '$password'");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	if($list==null)
	{
		echo "false";		
	}
	else
	{
		echo "true";
	}
	
?>
