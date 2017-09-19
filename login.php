<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>HTML5在线聊天 - 提示</title>
		<meta http-equiv = "refresh"  content = "3;url=chat/" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
<body>
	<?php
		header("Content-type:text/html;charset=utf8;");
		error_reporting(E_ALL ^ E_DEPRECATED);		//降低警报
		ini_set("error_reporting","E_ALL & ~E_NOTICE");
		//包含数据库连接文件
		include('connection.php');
		session_start();
	?>
        <div class="container">
            <header>
                <h1>Html5 <span>在线聊天</span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4    onSubmit="return InputCheck(this)"-->
					<a class="hiddenanchor" id="toresult"></a>
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>

                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form   method="post" action="" autocomplete="on" >
                                <p>
                                   	<?php
										if(!$_GET['action']=="login" && !$_GET['action']=="logout"){
											echo '<h1>禁止访问</h1>';
											exit('<font color="red">非法访问！点击返回 </font><a href="me.php">用户中心</a> ');
										}
										if($_GET['action']=="login"){
											echo '<h1>登入成功</h1>';
											$username = $_SESSION['username'];
											echo $username,' ，欢迎你！3秒后进入 <a href="chat/">聊天界面</a><br />';
											echo '点击此处 <a href="me.php">用户中心</a> 。<br />';
											exit;
										}

										//注册成功
										if($_GET['action']=="singup"){
											echo '<h1>注册成功</h1>';
											$username = $_SESSION['username'];
											echo $username,' ，欢迎你！5秒后进入 <a href="chat/">聊天界面</a><br />';
											exit ('点击此处 <a href="me.php">用户中心</a> 。<br />');
										}


											//注销登录
										if($_GET['action']=="logout"){
											echo '<h1>注销成功</h1>';
											unset($_SESSION['userid']);
											unset($_SESSION['username']);

											//2、清空session信息
											$_SESSION = array();

											//3、清楚客户端sessionid
											if(isset($_COOKIE[session_name()]))
											{
											  setCookie(session_name(),'',time()-3600,'/');
											}
											//4、彻底销毁session
											session_destroy();
											session_write_close();
											echo '注销成功！点击此处 <a href="index.php">登录</a>';
											exit;
										}
									?>
                                </p>
                               
                                <p class="login button">
									 <input type="submit" name='submit' value='登出' />
								</p>
                                <p class="change_link">
									还没有账号？
									<a href="#toregister" class="to_register">加入我们</a>

								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>

    </body>
</html>
