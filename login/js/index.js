jQuery(document).ready(function($) {

	var $username = $('#username');
	var $password = $('#password');
	var $btn = $('#submit');
	var $message = $('.input-error');

	$('#window').attr('style', '');

	$btn.on('click', function (){
		if (!check()) {
			return false;
		};
		if ($(this).hasClass('loading')) {
			return false;
		};

		$(this).addClass('loading');
		$.ajax({
			url: 	'login.php',
			data: 	{
				username: 	$username.val(),
				password: 	$password.val()
			},
			type: 	'POST',
			dataType: 	'json',
			success: 	function (data){

				if (data.message) {
					$message.html(data.message);
					$btn.removeClass('loading');
					return ;
				};
				$btn.addClass('none');
				$('#window').addClass('flip');
				$('#go-admin').attr('href',data.url);
			},
			error: 		function (a,b){
				console.log(a,b);
				$message.html('服务器错误，请稍候再试！');
				$btn.removeClass('loading');
			}
		});

	});

	$username.on('focus',function (){
		$message.html('');
	});
	$password.on('focus',function (){
		$message.html('');
	});

	$(window).on('keydown',function (ev){
		ev = ev || window.event;
		if (ev.keyCode === 13) {
			$btn.click();
		};
		
	});

	function check(){
		var re = /[\\\s\<\>\'\"]/;
		var username = $username.val().trim();
		var password = $password.val();
		$message.html('');
		if (!username) {
			$message.html('请输入用户名');
			return false;
		}else if(username.length < 4 || username.length > 20){
			$message.html('用户名长度应大于4位小于20位');
			return false;
		}else if(re.test(username)){
			$message.html('用户名含有敏感字符');
			return false;
		};

		if (!password) {
			$message.html('请输入密码');
			return false;
		}else if (!isNaN(Number(password))) {
			$message.html('密码不得为纯数字');
			return false;
		}else if(password.length < 6 || password.length > 20){
			$message.html('密码长度应大于6位小于20位');
			return false;
		};
		return true;
	}


});