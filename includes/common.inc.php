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
//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Defined!');
}
//设置字符集编码
header('Content-Type: text/html; charset=utf-8');

define('ROOT_PATH',substr(dirname(__FILE__),0,-9));


//拒绝PHP低版本
if (PHP_VERSION < '4.1.0') {
	exit('Version is to Low!');
}

//引入核心函数库
require ROOT_PATH.'/includes/global.func.php';
date_default_timezone_set("Asia/Shanghai");
define('START_TIME',_runtime());

//数据库连接
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','123456');
define('DB_NAME','myweb');
global $db_node;
$db_node = 'node';

global $_conn;
$_conn = @mysql_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败');
mysql_select_db(DB_NAME) or die('找不到指定的数据库');
mysql_query('SET NAMES UTF8') or die('设定字符集错误');

?>