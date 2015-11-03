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
define('SCRIPT','about');
require dirname(__FILE__).'/includes/common.inc.php';
require ROOT_PATH.'/includes/title.inc.php';

?>

<body>
<div class="ibody">
  <header>
  <?php  
    require ROOT_PATH.'/includes/header.inc.php';
  ?>
  </header>
  <article>
    <h3 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">关于我</a></h3>
    <div class="about">
      <h2>Just about me</h2>
      <ul>
        <p>zhe-he,web前端开发工程师,精通原生javascript，熟练使用sea,require等MVC框架，了解angularjs,reactjs等模块化框架，熟悉使用git,glup等开发工具，初入nodejs,php。</p>
        <p>热烈庆祝本网站1.0上线！</p>
        <p>热烈庆祝本网站1.0上线！</p>
        <p>热烈庆祝本网站1.0上线！</p>
      </ul>
      <h2>About my blog</h2>
      <ul class="blog_a">
        <p>域  名：www.hezhe.pw 创建于2015年09月12日 <a href="http://www.net.cn/domain/" class="blog_link" target="_blank">注册域名</a><a class="blog_link" href="http://koubei.baidu.com/womc/s/www.hezhe.pw" target="_blank">邀你点评</a></p>
        <p>服务器：阿里云服务器<a href="http://www.aliyun.com/product/ecs/" class="blog_link" target="_blank">购买空间</a>
        <p>程  序：php</p>
        <p>微信公众号：暂未开通</p>
      </ul>
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
