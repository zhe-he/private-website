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
//定义个常量，用来指定本页的内容
define('SCRIPT','style');
require dirname(__FILE__).'/includes/common.inc.php';
require ROOT_PATH.'/includes/title.inc.php';

$page_html = _page_sql('mood','mood','timeAxis.php',10)
?>

<body>
<link href="css/about.css" rel="stylesheet">
<div class="ibody">
  <header>
  <?php require ROOT_PATH.'/includes/header.inc.php'; ?>
  </header>
  <article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="timeAxis">时间轴</a></h3>
    <div class="time_axis">
      <?php  
        $str = '';
        for ($i=0; $i < count($pageDataArr); $i++) { 
          $str .= '<div class="timeCell">
        <div class="timeview">
          <p><img src="'.stripslashes($pageDataArr[$i]['img_src']).'" />'.nl2br(stripslashes($pageDataArr[$i]['content'])).'</p>
        </div>
        <span class="dataview">'.date('Y:m:d',strtotime($pageDataArr[$i]['time'])).'</span>
      </div>';
        }
        echo $str;
        echo $page_html;
      ?>
      
    </div>
  </article>
  <aside>
    <?php require ROOT_PATH.'/includes/peisonal.inc.php' ?>
  </aside>
  <script src="js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
