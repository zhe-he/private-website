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

$id = @$_GET['id'];
$data = _find_sql("SELECT * FROM $db_node WHERE id='$id'");
$type = '';
$title = '';
$time = '';
$content = '';
$reada = 0;
$prev = Array();
$next = Array();

$hotData = Array();
if(count($data) != 0){
  $type = $data[0]['type'];
  $title = $data[0]['title'];
  $time = $data[0]['time'];


  session_start();
  $sessionStr = md5($id.$type.$title.$time);
  $reada = $data[0]['reada'] + 1;
  
  if(!isset($_SESSION[$sessionStr])){
    @mysql_query("UPDATE $db_node SET reada=$reada WHERE id=$id");
  }
  $_SESSION[$sessionStr] = $sessionStr;

  $content = nl2br(stripslashes($data[0]['content']));

  $prev = _find_sql("SELECT * FROM $db_node where id<$id ORDER BY id DESC LIMIT 1");
  $next = _find_sql("SELECT * FROM $db_node where id>$id ORDER BY id ASC LIMIT 1");

  $hotData = _find_sql("SELECT * FROM $db_node where type='$type' ORDER BY time DESC LIMIT 6");
}

?>

<body>
<div class="ibody">
  <header>
    <?php require ROOT_PATH.'/includes/header.inc.php'; ?>
  </header>
  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><?php 
        $str = '<a href="';
        if ($type === '素年锦时') {
          $str .= 'newlist.php';
        }elseif($type === '程序人生') {
          $str .= 'share.php';
        }else{
          $str .= 'javascript:;';
        }
        $str .= '">'.$type.'</a>';
        echo $str;
    ?>><a href="javascript:;">正文页</a></h2>
    <div class="index_about">
      <h2 class="c_titile"><?php echo $title; ?></h2>
      <p class="box_c"><span class="d_time">发布时间：<?php echo $time; ?></span><span>编辑：zhe-he</span><span>浏览（<?php echo $reada; ?>）</span></p>
      <ul class="infos">
        <?php echo $content; ?>
      </ul>
      <div class="keybq">
        <p><span>关键字词</span>：<?php echo $type; ?></p>
      </div>
      <div class="nextinfo">
        <?php  
          if(count($prev) != 0){
            echo '<p>上一篇：<a href="new.php?id='.$prev[0]['id'].'">'.$prev[0]['title'].'</a></p>';
          }
          if(count($next) != 0){
            echo '<p>下一篇：<a href="new.php?id='.$next[0]['id'].'">'.$next[0]['title'].'</a></p>';
          }
        ?>
      </div>

      <!-- 多说 start -->
    <div class="ds-thread" data-thread-key="<?php echo $id; ?>" data-title="<?php echo $title; ?>" data-url="<?php echo 'new.php?id='.$id ?>"></div>

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
      <!-- 多说 end -->


      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <?php  
            $str = '';
            for ($i=0; $i < count($hotData); $i++) { 
              $str .= '<li><a href="new.php?id='.$hotData[$i]['id'].'" title="'.$hotData[$i]['title'].'">'.$hotData[$i]['title'].'</a></li>';
            }
            echo $str;
          ?>
        </ul>
      </div>
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
