
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

$page_html = _page_sql($db_node,'素年锦时','share.php');

?>

<body>
<div class="ibody">
  <header>
  <?php require ROOT_PATH.'/includes/header.inc.php'; ?>
  </header>
  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="share.php">技术分享</a></h2>
    <div class="bloglist">

      <?php  
        $str = '';
        for ($i=0; $i < count($pageDataArr); $i++) { 
          $href = 'new.php?id='.$pageDataArr[$i]['id'];
          $content = mb_substr(stripslashes($pageDataArr[$i]['content']),0,120,'utf-8');
          $str .= '<div class="newblog">
            <ul>
              <h3><a href="'.$href.'">'.$pageDataArr[$i]['title'].'</a></h3>
              <div class="autor"><span>作者：zhe-he</span><span>分类：[<a href="'.$href.'">'.$pageDataArr[$i]['type'].'</a>]</span><span>浏览（<a href="'.$href.'">'.$pageDataArr[$i]['reada'].'</a>）</span></div>
              <p>'.$content.'<a href="'.$href.'" target="_blank" class="readmore">全文</a></p>
            </ul>
            <figure><img src="'.stripslashes($pageDataArr[$i]['img_src']).'" ></figure>
            <div class="dateview">'.date('Y-m-d',strtotime($pageDataArr[$i]['time'])).'</div>
          </div>';
        }
        echo $str;
      ?>
    </div>
    <?php echo $page_html; ?>
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
