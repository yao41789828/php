window.onload = function(){   
	var arrIcon = ['http://www.xttblog.com/icons/favicon.ico','http://www.xttblog.com/wp-content/uploads/2016/03/123.png'];   
	var num = 0;     //����ͷ��ı�   
	var iNow = -1;    //�����ۼӸı����Ҹ���   
	var icon = document.getElementById('user_face_icon').getElementsByTagName('img');   
	var btn = document.getElementById('btn');
	var text = document.getElementById('text');
	var content = document.getElementsByTagName('ul')[0];
	var img = content.getElementsByTagName('img');
	var span = content.getElementsByTagName('span');

	icon[0].onclick = function(){
		if(num==0){
			this.src = arrIcon[1];
			num = 1;
		}else if(num==1){
			this.src = arrIcon[0];
			num = 0;
		}
	}
	btn.onclick = function(){
		if(text.value ==''){
			alert('���ܷ��Ϳ���Ϣ');
		}else {
			content.innerHTML += '<li><a href="info.php"><img style="float:right;" src="'+arrIcon[num]+'"></img></a><span style="float:right; background: #7cfc00;">'+text.value+'</span></li>';   
			iNow++;
			/*if(num==0){
				img[iNow].className += 'imgright';
				span[iNow].className += 'spanright';
			}else {
				img[iNow].className += 'imgleft';
				span[iNow].className += 'spanleft';
			}*/
			text.value = '';
			 // ���ݹ���ʱ,�����������õ���׶�
			 contentcontent.scrollTop=content.scrollHeight;
		}
	}
}