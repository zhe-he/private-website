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

?>

<body>
<div class="ibody">
  <header>
  <?php require ROOT_PATH.'/includes/header.inc.php'; ?>
  </header>
  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="messBoard.php">留言板</a></h2>
    <div class="index_about">
      <!-- 多说评论框 start -->
      <div class="ds-thread" data-thread-key="messBoard" data-title="留言板" data-url="http://www.hezhe.pw/messBoard.html"></div>

    <script type="text/javascript">
    var duoshuoQuery = {short_name:"hezhe"};
      (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0] 
         || document.getElementsByTagName('body')[0]).appendChild(ds);
      })();
      </script>
    </div>
  </article>
  <aside>
    <?php include ROOT_PATH.'/includes/rightmenu.inc.php'; ?>
  </aside>
  <script src="js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
