<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>HTML5在线聊天 - 个人中心</title>
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
			//ini_set("error_reporting","E_ALL & ~E_NOTICE");
			//包含数据库连接文件
			include("connection.php");
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
                            <form   method="post" action="login10.php" autocomplete="on" > 
                                <h1>个人中心</h1>
                                <p>
									<?php
										//检测是否登录，若没登录则转向登录界面  
										if(!isset($_SESSION['userid'])){
											echo '身份已过期，请重新<a href="index01.php">登入</a> .<br />';
											//header("Location:login.html");
											exit();
										}
										$userid = $_SESSION['userid'];
										$username = $_SESSION['username'];
										$user = $_SESSION['user'];
										$user_query = mysql_query("SELECT * FROM users where U_ID='$userid' limit 1");
										$res = mysql_fetch_array($user_query);
										echo '用户ID：',$userid,'<br />';
										echo '用户名：',$username,'<br />';
										echo '密码：  ',$res['U_PassWord'],'<br/>';
									?>
                                </p>
                               
                                <p class="login button">
									<a href="login.php?action=logout" style="text-decoration:none;">注销</a>
								</p>
                                <p class="change_link">
									<!--还没有账号？-->
									<a href="#toregister" class="to_register">修改信息</a>
									<a href="chat/" class="to_result"> 返回首页</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="login.php" autocomplete="on"> 
                                <h1> 个人信息更改 </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">用户名：</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg.ykk/123456" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > 邮箱：</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg.41789828@qq.com"/> 
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">手机号码：</label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="tel" placeholder="请输入密码"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">确认密码：</label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="请再次填写密码"/>
                                </p>
                                <p class="signin button">
									<input type="submit" value="保存"/>
								</p>
                                <p class="change_link">  
									<!--不想修改了？-->
									<a href="#toresult" class="to_result"> 修改密码</a>
									<a href="#tologin" class="to_register"> 取消</a>
								</p>
                            </form>
                        </div>

						<div id="result" class="animate form">
                            <form  action="login.php" autocomplete="on"> 
                                <h1> 个人信息更改 </h1>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">新密码：</label>
                                    <input id="password" name="passwordsignup" required="required" type="password" placeholder="请输入新密码"/>
                                </p>
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">新密码：</label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="请输入新密码"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">确认密码：</label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="请再次填写新密码"/>
                                </p>
                                <p class="signin button">
									<input type="submit" value="保存"/>
								</p>
                                <p class="change_link">  
									不想修改了？
									<a href="#tologin" class="to_register"> 取消</a>
								</p>
                            </form>
                        </div>

                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
