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
//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);

require '../includes/common.inc.php';
require ROOT_PATH.'/includes/confirm.inc.php';

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台模板管理系统</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>

<body>
<div class="top"></div>
<div id="header">
	<div class="logo">乱红飞过的后台管理系统</div>
	<div class="navigation">
		<ul>
		 	<li>欢迎您！</li>
			<li><a href="javascript:;"><?php echo DB_USER; ?></a></li>
			<li><a href="javascript:;">修改密码</a></li>
			<li><a href="javascript:;">设置</a></li>
			<li><a href="javascript:;">退出</a></li>
		</ul>
	</div>
</div>
<div id="content">
	<div class="left_menu">
			<ul id="nav_dot">
      <li>
          <h4 class="M1"><span></span>数据管理</h4>
          <div class="list-item none">
            <a data-src="node.php?type=1" href='javascript:;'>技术分享</a>
            <a data-src="node.php?type=2" href='javascript:;'>素年锦时</a>
            <a data-src="mood.php" href='javascript:;'>时间轴</a>
            <a data-src="" href='javascript:;'>留言板</a>
          </div>
        </li>
        <li>
          <h4 class="M2"><span></span>用户管理</h4>
          <div class="list-item none">
            <a href='#'>待定</a>
            <a href='#'>待定</a>
            <a href='#'>待定</a>        
           </div>
        </li>

    </ul>
		</div>
		<div class="m-right">
			<div class="right-nav">
					<ul>
							<li><img src="images/home.png"></li>
								<li style="margin-left:25px;">您当前的位置：</li>
						</ul>
			</div>
			<div id="main" class="main">
				
			</div>
		</div>
</div>
<div class="bottom"></div>


</body>
</html>
