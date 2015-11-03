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

/**
 *_runtime()是用来获取执行耗时
 * @access public 	
 * @return float
 */
function _runtime() {
	$_mtime = explode(' ',microtime());
	return $_mtime[1] + $_mtime[0];
}

/**
 * _alert_back()表是JS弹窗
 * @access public
 * @param $_info
 * @return void 弹窗
 */
function _alert_back($_info) {
	echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
	exit();
}

/**
 * _code()是验证码函数
 * @access public 
 * @param int $_width 表示验证码的长度
 * @param int $_height 表示验证码的高度
 * @param int $_rnd_code 表示验证码的位数
 * @param bool $_flag 表示验证码是否需要边框 
 * @return int 这个函数执行后产生的验证码
 */
function _code($_width = 75,$_height = 25,$_rnd_code = 4,$_flag = false) {
	
	//创建随机码
	for ($i=0;$i<$_rnd_code;$i++) {
		$_nmsg .= dechex(mt_rand(0,15));
	}
	
	//保存在session
	$_SESSION['code'] = $_nmsg;
	
	//创建一张图像
	$_img = imagecreatetruecolor($_width,$_height);
	
	//白色
	$_white = imagecolorallocate($_img,255,255,255);
	
	//填充
	imagefill($_img,0,0,$_white);
	
	if ($_flag) {
		//黑色,边框
		$_black = imagecolorallocate($_img,0,0,0);
		imagerectangle($_img,0,0,$_width-1,$_height-1,$_black);
	}
	
	//随即画出6个线条
	for ($i=0;$i<6;$i++) {
		$_rnd_color = imagecolorallocate($_img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		imageline($_img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rnd_color);
	}
	
	//随即雪花
	for ($i=0;$i<100;$i++) {
		$_rnd_color = imagecolorallocate($_img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		imagestring($_img,1,mt_rand(1,$_width-1),mt_rand(1,$_height-1),'*',$_rnd_color);
	}
	
	//输出验证码
	for ($i=0;$i<strlen($_SESSION['code']);$i++) {
		$_rnd_color = imagecolorallocate($_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
		imagestring($_img,5,$i*$_width/$_rnd_code+mt_rand(1,10),mt_rand(1,$_height/2),$_SESSION['code'][$i],$_rnd_color);
	}
	
	//输出图像
	header('Content-Type: image/png');
	imagepng($_img);
	
	//销毁
	imagedestroy($_img);
	return $_nmsg;
}


/**
 * _sha1_uniqid 返回唯一标示符
 * @return string $_string
 */
function _sha1_uniqid() {
	return _mysql_string(sha1(uniqid(rand(),true)));
}

/**
 * _update_img 上传图片
 * @param  $name string 上传input=file的name
 * @param $url_dir string 上传后图片保存地址
 * @return  string 文件路径src
 */
function _update_img($name,$url_dir){
	$file = $_FILES[$name];
	$filename = '';

	$fileMimes = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif','');

	//判断类型是否是数组里的一种
	if (is_array($fileMimes)) {
		if (!in_array($file['type'],$fileMimes)) {
			_alert_back('只允许上传图片');
			exit;
		}
	}
	$isHaveImg = true;
	switch ($file['error']) {
		case 1:
			_alert_back('上传文件超过约定值1');
			break;
		case 2:
			_alert_back('上传文件超过约定值2');
			break;
		case 3:
			_alert_back('部分文件被上传');
			break;
		case 4:
			$isHaveImg = false;
			break;
	}
	//判断配置大小
	if ($file['size'] > 10000000) {
		_alert_back('上传文件不得超过10M');
		exit;
	}
	//判断目录是否存在
	if (!is_dir($url_dir)) {
		mkdir($url_dir,0777);  //最大权限0777,意思是，如果没有这个目录，那么就创建
	}

	if(is_uploaded_file($file["tmp_name"])){
		// 已经上传
		$filename = $url_dir.'/'.time().'_'.urlencode($file["name"]);
		if (!move_uploaded_file($file["tmp_name"], $filename)) {
			_alert_back('移动失败');
		}
	}else if($isHaveImg){
		_alert_back('临时文件夹找不到上传的文件');
	}

	return $filename;
}

/**
 * _find_sql 数据库查询
 * @param  $sql 查询条件
 * @return  array 查询数据数组
 */
function _find_sql($sql){
	$result = @mysql_query($sql);
	$dataArr = Array();
	while (!!$row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	  $dataArr[] = $row;
	}
	return $dataArr;
}


function _page_sql($dbname,$type,$href,$num=5){
	global $pageDataArr;

	$page = @$_GET['p'];
	if (!isset($page) || $page<1 || !is_numeric($page)) {
	  $page = 1;
	}
	
	$count = ceil(mysql_num_rows((@mysql_query("SELECT * FROM $dbname WHERE type='$type'")))/$num);

	if ($count !== 0 && $page > $count) {
	  $page = $count;
	}
	$now = ($page-1)*$num;
	$pageDataArr = _find_sql("SELECT * FROM $dbname WHERE type='$type' ORDER BY time DESC LIMIT $now,$num");

	if ($count <= 1) {
		return '';
	}

	$str = '<div class="page"><a title="Total record"><b>'.$count.'</b></a>';
	$href .= '?p=';
	if ($page > 2) {
		$str .= '<a href="'.$href.'1'.'">&lt;&lt;</a>';
	}
	if ($page > 1) {
		$str .= '<a href="'.$href.($page-1).'">&lt;</a>';
	}

	for ($i=1; $i < $count+1; $i++) { 
		if ($page == $i) {
			$str .= '<b>'.$i.'</b>';
		}else{
			$str .= '<a href="'.$href.$i.'">'.$i.'</a>';
		}
	}
	if ($page < $count) {
		$str .= '<a href="'.$href.($page+1).'">&gt;</a>';
	}
	if ($page < $count-1) {
		$str .= '<a href="'.$href.$count.'">&gt;&gt;</a>';
	}
	$str .= '</div>';
	return $str;
}

?>