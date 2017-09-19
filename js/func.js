//根据下拉框变换图片
function img_change(thisObj){
    var imgsrc = "/bbs/img/"+ thisObj.value+".gif";
    document.getElementById("tx_change").src=imgsrc;    
}

//检查是否都符合 注册 要求
function check_reg()
{
if(check_len() && check_pass() && check_email() && check_qq())
{
    return true;    
}else{
    return false;
    }
}

//检查密码长度不能少于6
function check_len(thisObj){
    if(thisObj.value.length==0)
    {
        document.getElementById('show_pass').innerHTML="密码不能为空";
        return false;
    }else{
    if (thisObj.value.length<6)
    {
        document.getElementById('show_pass').innerHTML="密码长度不少于6";
        return false;
    }
        document.getElementById('show_pass').innerHTML="";    
        return true;
      }
}

//检查俩次密码输入是否一致
function check_pass(thisObj){
    var psw=document.getElementById('pass');
    if(psw.value.length==0)
    {
        document.getElementById('show_pass').innerHTML="密码不能为空";
        return false;
    }else{
        document.getElementById('show_pass').innerHTML="";    

    if (thisObj.value!=psw.value)
    {
        document.getElementById('show_repass').innerHTML="两次密码输入不正确";
        return false;
    }
        document.getElementById('show_repass').innerHTML="";
        return true;
    }
}

//检查email是否正确
function check_email(thisObj){
    var reg=/^([a-zA-Z\d][a-zA-Z0-9_]+@[a-zA-Z\d]+(\.[a-zA-Z\d]+)+)$/gi;    
    var rzt=thisObj.value.match(reg);
    if(thisObj.value.length==0){
        document.getElementById('show_e').innerHTML="Email不能为空";
        return false;
        }else{
    if (rzt==null)
    {
        document.getElementById('show_e').innerHTML="Email地址不正确";
        return false;
    }
        document.getElementById('show_e').innerHTML="";
        return true;
  }

}

//检查qq格式是否正确
function check_qq(thisObj){
    var qq=document.getElementById('qq').value;
    var reg=/^\d+$/;
    if(qq.search(reg))
    {
        document.getElementById('show_qq').innerHTML=" QQ 只能为数字";
        return false;
    }else{
        document.getElementById('show_qq').innerHTML="";
        return true ;
        }
    
    
}
