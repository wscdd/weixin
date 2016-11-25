<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
 <head>
    <meta charset="UTF-8">
    <title></title>
	    <link rel="stylesheet" type="text/css" href="/blog1/Public/Admin/css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="/blog1/Public/Admin/css/main.css"/>
	    <script type="text/javascript" src="/blog1/Public/Admin/js/libs/modernizr.min.js"></script>
</head><!--外部样式模版head-->

<body id="ti">
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('Index/Index');?>">首页</a></li>
               
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo $_COOKIE['uname']?></a></li>
                <li><a href="<?php echo U('Update/index');?>">修改密码</a></li>
                <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div><!--头部模版header-->
<div   class="container clearfix">
<div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Opus/con');?>"><i class="icon-font">&#xe008;</i>采集管理</a></li>
                       
                        <li><a href="<?php echo U('Cation/Index');?>"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="<?php echo U('Index/comment');?>"><i class="icon-font">&#xe012;</i>文章管理</a></li>
                        <!--<li><a href="<?php echo U('Opus/opus_con');?>"><i class="icon-font">&#xe033;</i>广告管理</a></li>-->
                    </ul>
                </li>
                
            </ul>
        </div>
    </div><!--左侧模版left-->   
    <!--/sidebar-->
    <div  class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/Index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">采集管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>                     
                            <th width="70">内容:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="tian" type="text"></td>						 
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="button" onclick="checktype()"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="http://WWW.wsc.com/blog1/Public/qs.py"><i class="icon-font"></i>采集糗事</a>
                        <a href="http://WWW.wsc.com/blog1/Public/qsimg.py"><i class="icon-font"></i>采集逗图</a>                        <a  href="javascript:void(0)" id="delall">批量删除</a>
                        
                    </div>
                </div>
                <div class="result-u77777-u                      ">
                    <table class="result-tab" width="100%">
                        <tr style="height:20px">
                            <th class="tc" width="5%">
                                <input class="allChoose" id="check_all" type="checkbox">
                                <span>全选</span>
                            </th>
                            <th style="width:3%;">ID</th>
            
                           
                            <th  style="width:10%;">作者</th>
                            <th>内容</th>
                            <th style="width:8%;">时间</th>
                            <th style="width:5%;">状态</th>
                            <th style="width:5%;">喜欢人数</th>
        
                            <th style="width:5%;">点击量</th>
                            <th style="width:5%;">操作</th>
                        </tr>
                        
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr id="k_<?php echo ($v["qsid"]); ?>" name="k_<?php echo ($v["qsid"]); ?>">
                            <td class="tc">
                                <input type="checkbox" name="xuan" value="<?php echo ($v["qsid"]); ?>">
                            </td>
                            <td style="width:30px;">
                                <input name="ids[]" value="59" type="hidden">          
                                <?php echo ($v["qsid"]); ?>
                            </td>
                            
                            
                            <td><span id='author'><?php echo ($v["zuozhe"]); ?></span></td>
            
                            <td width="50%"><?php echo ($v["qstext"]); ?></td>
                            <td><?php echo ($v["qstime"]); ?></td>
                        <?php if($v['qsstatus']==0){ ?>
                            <td>不显示</td>
                        <?php }else{ ?>
                            <td>显示</td>
                        <?php  } ?>
                            <td><?php echo ($v["qslike"]); ?></td>
                            <td><?php echo ($v["qscomment"]); ?></td>
                            
                            <td>
                                <!-- <a class="link-update" href="<?php echo U('Opus/save_art',array('id'=>$v[id]));?>" >修改</a> -->
                                <a class="link-del" href="javascript:void(0)" id="<?php echo ($v["qsid"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                        
                    </table>
                    <div class="list-page"><?php echo ($str); ?>当前为<?php echo ($page); ?>页</div>
                </div>
            </form>
        </div>
    </div>
    

    <!--/main-->
</div>
</body>
</html>
<script src="/blog1/Public/Admin/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    //反选
    $('#check_all').click(function(){
        $(":checkbox").each(function(){
            $(this).attr('checked',!$(this).attr('checked'));
        })
      })
    //单删
    $('.link-del').click(function(){
       var qsid=$(this).attr('id');
       //alert(id);
       $.ajax({  
            type:'GET',  
            url:'<?php echo U('del');?>',  
            data:{ 
                qsid:qsid,   
            },  
            success:function(msg){  
                if(msg){  
                 //alert(1);
                 $('#k_'+msg).remove();
                }   
     }
    })
    });
     //批删
     $('#delall').click(function(){
        var box=$("input[name=xuan]:checked");
        var i=box.length;
        if(!i){
         alert('至少选择一项');
         return;
        }
        if(confirm("确定要删除所选项目？")) {
        var checkedList = new Array();
        $("input[name='xuan']:checked").each(function() {
        checkedList.push($(this).val());
        });
        //alert(checkedList);
        $.ajax({  
                type:'GET',  
                url:"<?php echo U('delall');?>",  
                data:{   
                    qsid:checkedList.toString()  
                },
                dataType:'json',  
                success:function(msg){
                var count=checkedList.length;
                for(var i=0;i<count;i++){
                 $('#k_'+checkedList[i]).remove();   
                }        
                }  
            }) 
        }
      })

    function checktype() {

       var tian=document.getElementById('tian').value
       var ajax = new XMLHttpRequest();
       ajax.onreadystatechange = function() {
           if (ajax.readyState == 4 && ajax.status == 200) {
               var response = ajax.responseText;
               if (ajax.responseText==0) 
                {
                    alert('请填写要查询的关键字')
                }else if (ajax.responseText==-1) 
                {
                    alert("没有相关数据,请重新输入")
                }else
                {
                    document.getElementById('ti').innerHTML=response
                }
           }
       };
       ajax.open('get','<?php echo U('Opus/checktype');?>?tian='+tian);
       ajax.send();
    } 
    function change(id) {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById('zhi'+id).innerHTML=ajax.responseText;
            }
        };
        ajax.open('get', "<?php echo U('Opus/chang');?>?id="+id);
        ajax.send();
    }
     function fun(page){
        var ajax=new XMLHttpRequest();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
                document.getElementById('ti').innerHTML=ajax.responseText;
            }
        }
        //ajax.open('get',"<?php echo U('Opus/opus_con');?>page="+page);
        ajax.open('get',"<?php echo U('Opus/con');?>?page="+page);
        ajax.send();
    }
    
   b=0 
    function zengdian(id)
    {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('zengdian_'+id).innerHTML;
                  var c = parseInt(count);
                 b= document.getElementById('zengdian_'+id).innerHTML=c+1;
                  
                  
              }
            }
        }
        ajax.open('get',"<?php echo U('Opus/zengdian');?>?art_id="+id);
        ajax.send(null);
    }
   
 a=0 
    function zengzan(id)
    {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function()
        {
            if(ajax.readyState==4 )
            { 

              if(ajax.responseText)
              {
                  var count = document.getElementById('zengzan_'+id).innerHTML;
                  var c = parseInt(count);
                 a= document.getElementById('zengzan_'+id).innerHTML=c+1;
                  
                  
              }
            }
        }
        ajax.open('get',"<?php echo U('Opus/zengzan');?>?art_id="+id);
        ajax.send(null);
    }
</script>