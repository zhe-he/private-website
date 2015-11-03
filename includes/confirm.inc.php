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

session_start();
if(@$_SESSION['USERNAME'] !== DB_USER && @$_SESSION['PASSWORD'] !== DB_PWD){
	header('Location:/login/index.html');
};

?>