<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5在线聊天-个人信息</title>
     <link rel="stylesheet" type="text/css" href="css/style.css" />
	 <script src="js/func.js"> </script>
</head>
<body>
	<?php
		header("Content-type:text/html;charset=utf8;");
		error_reporting(E_ALL ^ E_DEPRECATED);		//降低警报
		//ini_set("error_reporting","E_ALL & ~E_NOTICE");
		//包含数据库连接文件
		include("connection.php");
		session_start();
		//检测是否登录，若没登录则转向登录界面  
		if(!isset($_SESSION['userid'])){
			echo '身份已过期，请重新<a href="index.php">登入</a> .<br />';
			//header("Location:login.html");
			exit();
		}
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
		$user = $_SESSION['user'];
		$user_query = mysql_query("SELECT * FROM U_List where U_ID='$userid' limit 1");
		$res = mysql_fetch_array($user_query);
		//echo '用户ID：',$userid,'<br />';
		//echo '用户名：',$username,'<br />';
		//echo '密码：  ',$res['U_PassWord'],'<br/>';
	?>
    <div id="container">
        <div class="header">
            <span style="float: left;"><a href="#" onclick="javascript :history.back(-1);">返回</a></span>
            <span><?php date_default_timezone_set('prc'); echo date('H:i'); //echo date('Y-m-d H:i:s'); ?></span>
			<span style="float: right;"><a href="../login.php?action=logout">注销</a></span>
        </div>
        <ul class="content">
			<!-- 欢迎加入qq群：454796847、135430763 -->
				<?php
				//检测是否登录，若没登录则转向登录界面
				if(!isset($_SESSION['userid'])){
					echo '身份已过期，请重新<a href="../index01.php">登入</a> .<br />';

					//header("Location:../index01.php");
					exit();
				}echo '后续功能敬请期待';
				?>
		</ul>   
    </div>
</body>  
</html>