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
define('SCRIPT','index');
require dirname(__FILE__).'/includes/common.inc.php';
require ROOT_PATH.'/includes/title.inc.php';
$dataArr = _find_sql("SELECT id,title,type,img_src,content,time,reada FROM $db_node ORDER BY time DESC LIMIT 5");
$hotdataArr = _find_sql("SELECT id,title FROM $db_node ORDER BY reada DESC LIMIT 3");
?>


<body>
<div class="ibody">
  <?php  
    require ROOT_PATH.'/includes/header.inc.php';
  ?>
  <article>
    <div class="banner">
      <ul class="texts">
        <p>最似那一出炉的土豆，不盛凉风的娇羞，道一声称重，道一声长肉。</p>
        <p>唉，一只死猴子吃不胖的忧愁。</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>
      <!--单元循环s-->
      <?php
        $str = ''; 
        for ($i=0; $i < count($dataArr); $i++) {
          $href = 'new.php?id='.$dataArr[$i]['id'];
          $str.='<div class="blogs">'
            .'<h3><a href="'.$href.'">'.$dataArr[$i]['title'].'</a></h3>'
            .'<figure><img src="'.stripslashes($dataArr[$i]['img_src']).'" ></figure>'
            .'<ul>'
              .'<p>'.mb_substr(nl2br(stripslashes($dataArr[$i]['content'])),0,120,'utf-8').'</p>'
              .'<a href="'.$href.'" target="_blank" class="readmore">阅读全文&gt;&gt;</a>'
            .'</ul>'
            .'<p class="autor"><span>作者：zhe-he</span><span>分类：【<a href="'.$href.'">日记</a>】</span><span>浏览（<a href="'.$href.'">'.$dataArr[$i]['reada'].'</a>）</span></p>'
            .'<div class="dateview">'.date('Y-m-d',strtotime($dataArr[$i]['time'])).'</div>'
          .'</div>';
        }
      echo $str;
      ?>
      <!--单元循环e-->
    </div>
  </article>
  <aside>
    <?php require ROOT_PATH.'/includes/peisonal.inc.php' ?>
    <div class="tj_news">
      <h2>
        <p class="tj_t1">最新文章</p>
      </h2>
      <ul>
        <?php 
          $str = '';
          for ($i=0; $i < count($dataArr); $i++) { 
            if ($i === 3) {
              break;
            }
            $str .= '<li><a href="new.php?id='.$dataArr[$i]['id'].'">'.$dataArr[$i]['title'].'</a></li>';
          }
           echo $str;
         ?>
         
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
      <?php 
        $str = '';
        for ($i=0; $i < count($hotdataArr); $i++) { 
          $str .= '<li><a href="new.php?id='.$hotdataArr[$i]['id'].'">'.$hotdataArr[$i]['title'].'</a></li>';
        }
        echo $str;

      ?>
        
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="javascript:;">待定……</a></li>
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="javascript:;">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <script src="js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 -->
  <?php require ROOT_PATH.'/includes/footer.inc.php'; ?> 
</div>
</body>
</html>
