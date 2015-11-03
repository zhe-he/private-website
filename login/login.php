<?php
/**
* private-website Version1.0
* ================================================
* Copy 2015-2016 hezhe
* Web: http://www.hezhe.pw
* ================================================
* Author: zhe-he
* Date: 2015-10-27
*/
header('Content-Type: text/html; charset=utf-8');
$username = @$_POST['username'];
$password = @$_POST['password'];
if (!isset($username) || !isset($password)) {
	exit('Access Defined!');
}

$username = _check_username($username);
$password = _check_password($password);


$data = array();
if ($username['message'] || $password['message']) {
	$data['message'] = $username['message']?$username['message']:$password['message'];
	echo json_encode($data);
	exit();
}

if(!!$_conn = @mysql_connect('localhost',$username['value'],$password['value'])){

	session_start();
	$_SESSION['USERNAME'] = $username['value'];
	$_SESSION['PASSWORD'] = $password['value'];

	$data['url'] = '/admin/index.php';
	echo json_encode($data);
	mysql_close($_conn);
	
}else{
	$data['message'] = '用户名或密码错误';
	echo json_encode($data);
	exit();
}




function _check_username($_string,$_min_num=4,$_max_num=20) {
	//去掉两边的空格
	$_string = trim($_string);
	$message = '';
	
	//长度小于两位或者大于20位
	//限制敏感字符
	$_char_pattern = '/[<>\'\"\s]/';
	
	if (mb_strlen($_string,'utf-8') < $_min_num || mb_strlen($_string,'utf-8') > $_max_num) {
		$message = '用户名长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位';
	}elseif (preg_match($_char_pattern,$_string)) {
		$message = '用户名不得包含敏感字符';
	}
	
	//将用户名转义输入
	return array("message"=>$message,"value"=>htmlspecialchars_decode($_string));
	
}

function _check_password($_string,$_min_num=6,$_max_num=20) {
	//判断密码
	$message = '';
	if(is_numeric($_string)){
		$message = '密码不得为纯数字';
	}elseif (strlen($_string) < $_min_num || strlen($_string) > $_max_num) {
		$message = '密码不得小于'.$_min_num.'位或者大于'.$_max_num.'位';
	}
	
	//将密码返回
	return array("message"=>$message,"value"=>$_string);
	// return sha1($_string);
}

?>