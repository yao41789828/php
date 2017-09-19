<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>HTML5在线聊天</title>
     <link rel="stylesheet" type="text/css" href="css/style.css" />
	 <script src="js/func.js"></script>
</head>  
<body>
		<?php
		header("Content-type:text/html;charset=utf8;");
		error_reporting(E_ALL ^ E_DEPRECATED);		//降低警报
		ini_set("error_reporting","E_ALL & ~E_NOTICE");
		//包含数据库连接文件
		include("connection.php");
		session_start();
		
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
		$user = $_SESSION['user'];
		$user_query = mysql_query("SELECT * FROM users where U_ID='$userid'");
		$result = mysql_fetch_array($user_query);
		/*echo '用户ID：',$userid,'<br />';
		echo '用户名：',$username,'<br />';
		echo '密码：  ',$res['U_PassWord'],'<br/>';*/
	?>

    <div id="container">
        <div class="header">  
            <span style="float: left;">
		<?php 
			echo '<font size="5px">用户：</font>'.$result['U_Name'];
	 	?>
	</span>
		<span>
			<?php
				date_default_timezone_set('Asia/Shanghai');
				//ini_set('date.timezone','Asia/Shanghai');
				echo date('H:i'); //echo date('Y-m-d H:i:s'); 
			?>
		</span>
            <span style="float: right;"><a href="info.php">更多</a></span>
        </div>
        <ul class="content">  
			<!-- 欢迎加入qq群：454796847、135430763 -->
			<?php
				//检测是否登录，若没登录则转向登录界面
				if(!isset($_SESSION['userid'])){
					echo '身份已过期，请重新<a href="../index.php">登入</a> .<br />';

					//header("Location:../index01.php");
					exit();
				}
				$query=mysql_query("select * from chat order by id asc");		//asc limit 0,10  降序 desc
				while ($row=mysql_fetch_array($query)) {
					if(date('Y-m-d', time())==substr($row['time'],0,10)) {
						echo substr($row['time'],11,10);
					}else {
						echo $row['time'];
					}
					$id=$row['sender'];
					$res=mysql_fetch_array(mysql_query("select * from users where U_ID='$id'"));
					if($userid==$id){	//如果是自己发的消息
						echo '<li><a href="info.php"><img style="float:right;" src='.$res['U_Img'].'></img></a><span style="float:right; background: #7cfc00;">'.$row['message'].'</span></li>';
					}else{
						echo '<li><a href="info.php"><img style="float:left;" src='.$res['U_Img'].'></img></a><span style="float:left;">'.$row['message'].'</span></li>';
					}
				}
			?>
			<?php
				$contents = $_POST['contents'];
				$nowtime = date('Y-m-d H:i:s',time());
				if($_POST['contents']!=null){
					if(mysql_query("insert into chat values(null,$userid,'$nowtime', '$contents')")){
						//mysql_query("insert into chat (sender, time, message) values('$userid', 'date('Y-m-d h:m:s', time())', '$contents')")
						echo $nowtime.'<li><font color="red" size="1">发送成功</font>';		//将用户名，时间和发言内容进行插入
					}else{
						echo '<li> 发送失败！';
					}
					//$result=mysql_fetch_array(mysql_query("select * from users where U_ID='$userid'"));
					echo '<a href="info.php"><img style="float:right;" src='.$result['U_Img'].'></img></a><span style="float:right; background: #7cfc00;">'.$contents.'</span></li>';
				}
			?>
		</ul>
        <div class="footer">  
            <div id="user_face_icon">
                <img src="http://www.xttblog.com/icons/favicon.ico" alt="">  
            </div>
			<form action="" method="post">
				<textarea id="text" type="text" name="contents" placeholder="说点什么吧..."></textarea>
				<input id="btn" type="submit" value="提交">
			</form>
            <!--<textarea id="text" type="text" placeholder="说点什么吧..." ></textarea>
            <span id="btn">发送</span>-->
        </div>
    </div>
</body>
</html>