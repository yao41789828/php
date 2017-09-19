<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>HTML5在线聊天 - 登入</title>
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
			//error_reporting(E_ALL ^ E_DEPRECATED);		//降低警报
			ini_set("error_reporting","E_ALL & ~E_NOTICE");
			$username = $_POST['username'];
			$password = MD5($_POST['password']);
			$usernamesignup=$_POST['usernamesignup'];
			$passwordsignup = MD5($_POST['passwordsignup']);
			$passwordsignup_confirm = MD5($_POST['passwordsignup_confirm']);
			//包含数据库连接文件
			include('connection.php');
		?>
        <div class="container">
            <header>
                <h1>Html5 <span>在线聊天</span></h1>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4
                    	<p> 
                            <label for="emailsignup" class="youmail" data-icon="e" > 邮箱：</label>
                            <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg.41789828@qq.com"/> 
                       </p>-->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>

                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form   method="post" action="" autocomplete="on"> 
                                <h1>登入</h1>
                                <p>
                                    <B><label for="username" class="uname" data-icon="u" > 用户名/邮箱：</label></B>
                                    <input id="username" name="username" required="required" type="text" placeholder="ykk/41789828@qq.com"/>
                                </p>
                                <p>
                                    <B><label for="password" class="youpasswd" data-icon="p"> 密码： </label></B>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. Yao951012" />
                                </p>
                                <p class="keeplogin">
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
									<B><label for="loginkeeping">记住我</label></B>
								</p>
                                <p class="login button">
									 <input type="submit"  name='submit' value='登入'/>
								</p>

									<?php
										//检测用户名及密码是否正确
										if($_POST['submit']){
											$check_query = mysql_query("select U_ID from users where U_Name='$username' and U_PassWord='$password' limit 1");
											if($result = mysql_fetch_array($check_query)){
												//登录成功
												session_start();
												$_SESSION['username'] = $username;
												$_SESSION['userid'] = $result['U_ID'];
												$_SESSION['user'] = "你好";
												header("Location:login.php?action=login");
											} else {
												//echo $password;
												echo('<p><font color="red">用户名或密码错误，请重试！</font></p>');
											}
										}
									?>

                                <p class="change_link">
									还没有账号？
									<a href="#toregister" class="to_register">加入我们</a>
									
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="post" action=""> 
                                <h1> 注册 </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">用户名/邮箱：</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg.ykk/123456" />
                                </p>

                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">密码：</label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="请输入密码"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">确认密码：</label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="请再次填写密码"/>
                                </p>
                                <p class="signin button">
									<input type="submit" name='submit1' value='注册'/>
								</p>

								<?php
									//检测用户名及密码是否正确
										if($_POST['submit1']){
											$check_query = mysql_query("select * from users where U_Name='$usernamesignup'");
											if($result = mysql_fetch_array($check_query)>0){
													echo('<p><font color="red">用户名已存在，请重试！</font></p>');
											}
											if($passwordsignup!=$passwordsignup_confirm){
												echo('<p><font color="red">输入的密码不一致，请重试！</font></p>');
											}if(mysql_query("insert into users values(null,'$usernamesignup','$passwordsignup','ico/0.jpg')")){
												if($result = mysql_fetch_array(mysql_query("select * from users where U_Name='$usernamesignup'"))){
													//注册成功
													session_start();
													$_SESSION['username'] = $usernamesignup;
													$_SESSION['userid'] = $result['U_ID'];
													$_SESSION['user'] = "你好";
													$url="login.php?action=singup"; 
													exit ("<script language = 'javascript' type = 'text/javascript'>  window.location.href='$url'</script>"); 
												}else{
													exit ('<p><font color="red">注册失败，请重试！！！</font></p>');
												}
												
											}else{
												echo('<p><font color="red">注册失败，请重试！</font></p>');
											}
										}
								?>

                                <p class="change_link">  
									已经有账号了？
									<a href="#tologin" class="to_register"> 现在登入</a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>

    </body>
</html>