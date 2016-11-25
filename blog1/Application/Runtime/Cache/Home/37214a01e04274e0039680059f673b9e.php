<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="/Public/Home/css/styles.css" rel="stylesheet">
<link href="/Public/Home/css/view.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="/Public/Home/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>



<header>
  <nav id="nav">
    <ul>
      <li><a href="/" >网站首页</a></li>
      <?php if(is_array($cate)): foreach($cate as $key=>$cate_list): ?><li><a href="<?php echo U('Index/type');?>?id=<?php echo ($cate_list["cate_id"]); ?>" target="" title="<?php echo ($cate_list["cate_name"]); ?>"><?php echo ($cate_list["cate_name"]); ?></a></li><?php endforeach; endif; ?>
      <div class="viny" style="float: left;">
        <dl>
       
          <dd class="icon-song" style="margin-left: 55px"><font style="margin-right: 200px">南方姑娘</font><span></span></dd>
    
            <audio src="/Public/Home/images/nf.mp3" controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
    </ul>

    <script src="/Public/Home/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>  <!-- 引入网页头部 -->

<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <h2 class="t_nav"><a href="/">网站首页</a><a href="/">慢生活</a></h2>
      <h1 class="c_titile"><?php echo ($art_detail["title"]); ?></h1>
      <p class="box">发布时间：<?php echo ($art_detail["add_time"]); ?><span>作者：<?php echo ($art_detail["author"]); ?></span>
      <span id="read"></span></p>
      <ul>
       <?php echo ($art_detail["content"]); ?>

      </ul>
      <hr/>
      <div class="share" style="margin-top:15px; width: 100%" >
      	<!-- 提交评论 -->
       <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/js/lang/zh-cn/zh-cn.js"></script>
		<form action="<?php echo U('Index/comment');?>" method="post" id="myform" style="width: 50%">

			<textarea name="art_comment" class="common-textarea" id="content" cols="30" style="width: 100%;" rows="10" >
            </textarea>
            <input type="hidden" name="art_id" value="<?php echo ($art_detail["art_id"]); ?>"/>
            <input  value="提交评论" type="submit" style="margin-left:85%"/>
		</form>
		<script type="text/javascript">
	    //实例化编辑器
	    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	    var ue = UE.getEditor('content');
		</script>

      </div>
      <div style="background:#fff">
      	<!-- 按时间显示评论列表 -->
      	<ul id="tell">
      			
      	</ul>
      </div>
    
    </div>
    <!--bloglist end-->

    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="sunnav">
        <ul>
          <li><a href="/web/" target="_blank" title="网站建设">网站建设</a></li>
          <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">HTML5 / CSS3</a></li>
          <li><a href="/jstt/" target="_blank" title="技术探讨">技术探讨</a></li>
          <li><a href="/news/s/" target="_blank" title="慢生活">慢生活</a></li>
        </ul>
      </div>
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
        <h2>热门点击</h2>
        <ol>
          <?php if(is_array($hot)): foreach($hot as $key=>$hv): ?><li><span><strong><?php echo ($i++); ?></strong></span><a href="<?php echo U('Index/details');?>?id=<?php echo ($hv["art_id"]); ?>"><?php echo ($hv["title"]); ?></a></li><?php endforeach; endif; ?>
        </ol>
      </div>
      <div class="search">
        <form class="searchform" method="post" action="<?php echo U('Index/details');?>">
          <input type="text" name="s" value="Search/标题" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->
<footer>
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
        <dt><img src="/Public/Home/images/s8.jpg">
        <dt>
        <dd>DanceSmile
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html#comments" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
      </dl>
      <dl>
        <dt><img src="/Public/Home/images/s7.jpg">
        <dt>
        <dd>yisa
          <time>2小时前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/news/s/2013-07-31/533.html#comments" class="title">芭蕾女孩的心事儿</a>中评论：</dd>
        <dd>我手机里面也有这样一个号码存在</dd>
      </dl>
      <dl>
        <dt><img src="/Public/Home/images/s6.jpg">
        <dt>
        <dd>小林博客
          <time>8月7日</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-06-18/285.html#comments" class="title">如果个人博客网站再没有价值，你还会坚持吗？ </a>中评论：</dd>
        <dd>博客色彩丰富，很是好看</dd>
      </dl>
    </div>
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
        <li><a href="/"><img src="/Public/Home/images/01.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/02.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/03.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/04.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/05.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/06.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/07.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/08.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/images/09.jpg"></a></li>
      </ul>
    </section>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2013 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer>
<div id="tbox"> 
<a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a>
</div>
</body>
</html>
<script>
 $(function(){
  var id=$("input[name=art_id]").val();
  //alert(1);
   $.get("<?php echo U('tell');?>",{id:id},function(msg){
   var str='';
   for(var i in msg){
    str +='<li>匿名用户'+msg[i]['comment_time']+msg[i]['art_comment']+'</li>';
   }
   $('#tell').html(str);
  },'json')
  $.get("<?php echo U('read');?>",{id:id},function(msg){
   var str='';
    str+='阅读量：'+msg;
   $('#read').html(str);
  },'json')
 }) 
</script>