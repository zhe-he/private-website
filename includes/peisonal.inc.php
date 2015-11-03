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
$dataArr = _find_sql("SELECT * FROM mood ORDER BY time DESC LIMIT 1");
?>
<div class="avatar"><a href="about.html"><span>关于zhe-he</span></a></div>
<div class="topspaceinfo">
  <h1>心情随语</h1>
  <p><?php echo $dataArr[0]['content']; ?></p>
</div>
<div class="about_c">
  <p>姓名：zhe-he | 何哲</p>
  <p>职业：Web前端工程师</p>
  <p>籍贯：湖北省―汉川市</p>
  <p>邮箱：<a href="mailto:luanhong_feiguo@sina.com">luanhong_feiguo@sina.com</a></p>
</div>
