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

$hotDataArr = _find_sql("SELECT * FROM $db_node ORDER BY reada DESC LIMIT 9");
$toDateArr = _find_sql("SELECT * FROM $db_node ORDER BY time DESC LIMIT 3");
?>
<div class="rnav">
      <li class="rnav1"><a href="newlist.php">日记</a></li>
      <li class="rnav2"><a href="messBoard.php">欣赏</a></li>
      <li class="rnav3"><a href="share.php">程序人生</a></li>
      <li class="rnav4"><a href="timeAxis.php">闲言碎语</a></li>
</div>
<div class="ph_news">
  <h2>
    <p>点击排行</p>
  </h2>
  <ul class="ph_n">
    <?php  
      $str = '';
      for ($i=0; $i < count($hotDataArr); $i++) { 
        if ($i<3) {
          $str .= '<li><span class="num'.($i+1).'">'.($i+1).'</span><a href="new.php?id='.$hotDataArr[$i]['id'].'">'.$hotDataArr[$i]['title'].'</a></li>';
        }else{
          $str .= '<li><span>'.($i+1).'</span><a href="new.php?id='.$hotDataArr[$i]['id'].'">'.$hotDataArr[$i]['title'].'</a></li>';
        }
      }
      echo $str;
    ?>
  </ul>
  <h2>
    <p>栏目推荐</p>
  </h2>
  <ul>
    <?php  
      $str = '';
      for ($i=0; $i < count($toDateArr); $i++) { 
        $str .= '<li><a href="new.php?id='.$toDateArr[$i]['id'].'">'.$toDateArr[$i]['title'].'</a></li>';
      }
      echo $str;
    ?>
    
  </ul>
  <h2>
      <p>最新评论</p>
  </h2>
  <div class="newDS">
    <div class="ds-recent-comments" data-num-items="3" data-show-avatars="1" data-show-time="1" data-show-title="1" data-show-admin="1" data-excerpt-length="70"></div>
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

</div>
<div class="copyright">
  <ul>
    <p> Design by <a href="javascript:;">DanceSmile</a></p>
    <p>蜀ICP备11002373号-1</p>
    </p>
  </ul>
</div>