<?php
/**
* private-website Version1.0
* ================================================
* Copy 2015-2016 hezhe
* Web: http://www.hezhe.pw
* ================================================
* Author: zhe-he
* Date: 2015-10-29
*/

//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
define('SCRIPT','node');

require '../includes/common.inc.php';
require ROOT_PATH.'/includes/confirm.inc.php';

$url = $_SERVER["REQUEST_URI"];
define('URL',ROOT_PATH.'/images/'.SCRIPT);

$type = @$_GET['type']==='1'?'程序人生':'素年锦时';

if (strpos($url,'?') && isset($_GET['action'])) {
	$title = $_POST['title'];
	$type = $_POST['type'];
	$content = $_POST['content'];
	
	$file_src = _update_img('file',URL);

	if (empty($content)) {
		_alert_back('内容不能为空');
	}

	
	$content = addslashes((trim($content)));
	$file_src = addslashes($file_src);
	if (empty($file_src)) {
		$sql = "INSERT INTO ".SCRIPT." (content,time,title,type) VALUES ('$content',NOW(),'$title','$type')";
	}else{
		$sql = "INSERT INTO ".SCRIPT." (content,img_src,time,title,type) VALUES ('$content','$file_src',NOW(),'$title','$type')";
	}
	mysql_query($sql) or die('添加数据库出错');

	_alert_back('提交成功');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>node</title>
	<link rel="stylesheet" type="text/css" href="css/submit.css">
</head>
<body>
<form enctype="multipart/form-data" action="node.php?action=node" method="post">
	标题：<input type="text" name="title" />
	分类：<input type="text" value="<?php echo $type; ?>" name="type" />
	<textarea id="content" name="content" class="content"></textarea>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input class="file" name="file" type="file" />
	<input class="submit" id="submit" type="submit" value="提交" />
</form>
<script type="text/javascript">
	document.getElementById('content').value = '';
	document.getElementById('submit').onclick = function (){
		if(document.getElementById('content').value.trim()===''){
			alert('内容不能为空');
			return false;
		}
	}
</script>
</body>
</html>