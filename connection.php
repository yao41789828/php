<html>
	<head>
		<title>插入数据</title>
		 <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	</head>
<body>
	<?php
		$host="localhost";  
		$db_user="u497286688_xixi6";
		$db_pass="yao951012";
		$db_name="u497286688_ser";
		$timezone="Asia/Shanghai";
		$conn= mysql_connect($host,$db_user,$db_pass);//or die('Could not connect: ' . mysql_error());    //连接MySQL数据库
		$select = mysql_select_db($db_name,$conn);

		//$str = "insert into Admin_Info (A_UserName,A_Password) values ('$name' , '$pwd')";   //列名A_Password与数据库定义A_Pwd不一致
		//$insert = mysql_query($str);   //直接调用SQL语句变量

		if($select)                     //判断连接是否成功
		{
			echo '<p align="left"><font color="red" size="1">提示:数据库连接成功！</font></p>';
		}else{ 
			echo '<p align="left"><font color="red" size="1">数据库连接失败。</font></p>';
		 }

		mysql_query("SET NAMES 'utf8'");	//取消乱码
		header("Content-type:text/html;charset=utf8;");
		error_reporting(E_ALL ^ E_DEPRECATED);		//降低警报
		ini_set("error_reporting","E_ALL & ~E_NOTICE");
	?>
</body>
</html>