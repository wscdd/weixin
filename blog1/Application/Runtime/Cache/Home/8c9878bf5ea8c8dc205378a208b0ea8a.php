<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />



<link href="/blog1/Public/Home/css/styles.css" rel="stylesheet">
<link href="/blog1/Public/Home/css/animation.css" rel="stylesheet"><!-- 没有此文件 -->
<!-- 返回顶部调用 begin -->
<link href="/blog1/Public/Home/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="/blog1/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/blog1/Public/Home/js/js.js"></script>
  <script type="text/javascript" charset="utf-8" src="/blog1/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/blog1/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/blog1/Public/Admin/js/lang/zh-cn/zh-cn.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/blog1/Public/utf8-php/lang/zh-cn/zh-cn.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="/blog1/Public/Home/js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
  <header>
  <nav id="nav">
    <ul>
      <li><a href="/" >网站首页</a></li>
      <?php if(is_array($cate)): foreach($cate as $key=>$cate_list): ?><li><a href="<?php echo U('Index/type');?>?id=<?php echo ($cate_list["cate_id"]); ?>" target="" title="<?php echo ($cate_list["cate_name"]); ?>"><?php echo ($cate_list["cate_name"]); ?></a></li><?php endforeach; endif; ?>
      <div class="viny" style="float: left;">
        <dl>
       
          <dd class="icon-song" style="margin-left: 55px"><font style="margin-right: 200px">南方姑娘</font><span></span></dd>
    
            <audio src="/blog1/Public/Home/images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
    </ul>

    <script src="/blog1/Public/Home/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>  <!-- 引入网页头部 -->

</header>
<!--header end-->
<div id="mainbody">
 <div class="info">
    <figure> <img src="/blog1/Public/Home/images/art.jpg"  alt="Panama Hat">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong> 当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</figcaption>
    </figure>

    <div class="card">
      <h1>我的名片</h1>
      <p>网名：Mrs.Liu</p>
      <p>职业：键盘毁灭师</p>
      <p>电话：18500344675</p>
      <p>qq：1091371645</p>
      <ul class="linkmore">
        <li><a href="<?php echo U('Liuyan/liuyan');?>" class="talk" title="给我留言"></a></li>
        <!-- <li><a href="#" class="address" title="联系地址"></a></li> -->
        <li><a href="#" class="email" title="给我写信"></a></li>
        <li><a href="<?php echo U('Photo/index');?>" class="photos" title="生活照片"></a></li>
        <!-- <li><a href="#" class="heart" title="关注我"></a></li> -->
      </ul>
    </div>

  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
    <ul class="bloglist">
        <?php if(is_array($data)): foreach($data as $key=>$art_list): ?><li>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title">
          <a href="<?php echo U('Index/details');?>?id=<?php echo ($art_list["art_id"]); ?>" style='color:#FFF;font-size: 30px' title="查看详情"><?php echo ($art_list["title"]); ?></a></h2>
          <ul class="textinfo">
            <a href="<?php echo ($art_list["source_img"]); ?>" title="查看原图">
            <img src="<?php echo ($art_list["thumb_img"]); ?>" width="200" height="100"></a>
            <p><a href="<?php echo U('Index/details');?>?id=<?php echo ($art_list["art_id"]); ?>" style='color:#FFF;font-size: 20px' title="查看详情"><?php echo ($art_list["art_desc"]); ?></a></p>
          </ul>
          
           <ul class="details" >
            <li class="likes"><a class="sss"style='color:#FFF;font-size: 20px ' id="like_<?php echo ($art_list["art_id"]); ?>" href="javascript:void(0)" onclick="like_fun(<?php echo ($art_list["art_id"]); ?>)" style="font-size: 20px" title="点赞"><?php echo ($art_list["praises"]); ?></a><a id="likedesc_<?php echo ($art_list["art_id"]); ?>" href="javascript:void(0)" onclick="like_desc(<?php echo ($art_list["art_id"]); ?>)" style="color:red;display:none;font-size: 20px"  title="取消点赞"></a></li>
            <li class="comments"></li>
            <li class="icon-time"><a href="#"><?php echo ($art_list["add_time"]); ?></a></li>
          </ul>
        </div>
        <!--arrow_box end--> 
      </li><?php endforeach; endif; ?>

    </ul>
     <aside>   
     
    <!--   <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
          <li><a href="/"><img src="/blog1/Public/Home/images/k01.jpg">腐女不可怕，就怕腐女会画画！
            <p>伤不起</p>
            </a></li>
          <li><a href="/"><img src="/blog1/Public/Home/images/k02.jpg">问前任，你还爱我吗？无限戳中泪点~
            <p>感兴趣</p>
            </a></li>
          <li><a href="/"><img src="/blog1/Public/Home/images/k03.jpg">世上所谓幸福，就是一个笨蛋遇到一个傻瓜。
            <p>喜欢</p>
            </a></li>
        </ul>
      </div> -->
      <div class="clicks">
        <h2>推荐文章</h2>
        <ol>
          <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀――浪漫的求婚词</a></li>
          <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香―个人网站模板</a></li>
        </ol>
      </div>
       <div class="tuijian">
        <h2>热门文章</h2>
        <ol>
          <?php if(is_array($hot)): foreach($hot as $key=>$hv): ?><li><span><strong><?php echo ($i++); ?></strong></span><a href="<?php echo U('Index/details');?>?id=<?php echo ($hv["art_id"]); ?>"><?php echo ($hv["title"]); ?></a></li><?php endforeach; endif; ?>
        </ol>
      </div>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="search{}">
        </form>
      </div>
      
    </aside>
    <!--bloglist end-->

  </div>
  <!--blogs end-->
</div>
<!--mainbody end-->
<!-- <footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">杨青个人博客</a></li>
        <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
      </ul>
    </div>
    <div class="visitors">
      <h2>最新评论</h2>
      <dl>
        <dt><img src="/blog1/Public/Home/images/s8.jpg">
        <dt>
        <dd>DanceSmile
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
      </dl>
      <dl>
        <dt><img src="/blog1/Public/Home/images/s7.jpg">
        <dt>
        <dd>yisa
          <time>2小时前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/news/s/2013-07-31/533.html" class="title">芭蕾女孩的心事儿</a>中评论：</dd>
        <dd>我手机里面也有这样一个号码存在</dd>
      </dl>
      <dl>
        <dt><img src="/blog1/Public/Home/images/s6.jpg">
        <dt>
        <dd>小林博客
          <time>8月7日</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-06-18/285.html" class="title">如果个人博客网站再没有价值，你还会坚持吗？ </a>中评论：</dd>
        <dd>博客色彩丰富，很是好看</dd>
      </dl>
    </div>
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
        <li><a href="/"><img src="/blog1/Public/Home/images/01.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/02.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/03.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/04.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/05.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/06.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/07.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/08.jpg"></a></li>
        <li><a href="/"><img src="/blog1/Public/Home/images/09.jpg"></a></li>
      </ul>
    </section>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer> -->
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> 
<a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a>
</div>
<!-- 代码结束 -->
</body>
</html>
<script src="/blog1/Public/Home/js/jquery-1.7.2.js"></script>
<script>
   aa=0
    function like_fun(id)
    {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('like_'+id).innerHTML;
                  var c = parseInt(count);
                  aa=document.getElementById('like_'+id).innerHTML =c+1;
                  document.getElementById('like_'+id).style.display='none';
                  aa=document.getElementById('likedesc_'+id).innerHTML =c+1;
                  document.getElementById('likedesc_'+id).style.display='block';
              }
            }
        }
        ajax.open('get',"<?php echo U('Index/likes');?>?art_id="+id);
        ajax.send(null);
    }
   bb=0
    //取消点赞
    function like_desc(id)
    {
      var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('like_'+id).innerHTML;
                  var c = parseInt(count);
                  bb= document.getElementById('like_'+id).innerHTML =c-1;
                  document.getElementById('like_'+id).style.display='block';
                  bb= document.getElementById('likedesc_'+id).innerHTML =c-1;
                  document.getElementById('likedesc_'+id).style.display='none';
              }
            }
        }
        ajax.open('get',"<?php echo U('Index/likedesc');?>?art_id="+id);
        ajax.send(null);
    }

</script>