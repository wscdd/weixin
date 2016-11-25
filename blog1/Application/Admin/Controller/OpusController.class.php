<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class OpusController extends CommonController 
{ 
  /**
   * [con description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function con()//作品管理展示
  { 
    $arr=D('Opus')->selall(); //调用M层分页方法
   // var_dump($obj);die;
    
       for($i=0;$i<count($arr['0']);$i++)
       {
        if (Strlen($arr['0'][$i]['title'])>9) {
          $arr['0'][$i]['title']=substr_replace($arr['0'][$i]['title'], '...', 9);//substr_replace(‘从什么中替换’,’替换成谁’,从第几位开始)  必须添加判断否则超过9位字符串的位置被替换成了... 没超过9位的字符串后面也会跟着...
        }
       }
    $page=$_GET['page']?$_GET['page']:1;
    $this->assign('page',$page);  
    $this->assign('data',$arr['0']);    
    $this->assign('str',$arr['1']); 
    $this->display('list');  
  }
  /**
   * [add_Opu description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   */
  
  /**
   * [checktype description]
   * @Author    Liujingwei
   * @DateTime  2016-10-19
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function checktype()//根据下拉条件输入关键字查询相关数据
  {
     $tian=I('get.tian');
     //var_dump($tian);die;
     if (!empty($tian)) 
     {
        $data=D('Opus')->checktype($tian);
        for ($i=0; $i<count($data); $i++) { 
         $data[$i]['qstext']=str_replace($tian, "<font color=red>$tian</font>",$data[$i]['qstext'] );
      }
        if ($data) 
        {
            $this->assign('data',$data);
            $this->display('list');  
        }else
        {
          echo -1;
        } 
     }
     else
     {
      echo "0";
     } 
  }
  /**
   * [del description]
   * @Author    Liujingwei
   * @DateTime  2016-10-20
   * @copyright [copyright]
   * @license   [license]
   * @version   [version]
   * @return    [type]      [description]
   */
  public function del()//删除数据
  {
    $qsid=I('get.qsid');
    $db=D('Opus');
    $re=$db->del($qsid);
    echo $qsid;
  }
  public function delall(){
    $qsid=I('get.qsid');
    $db=D('Opus');
    $re=$db->del($qsid);
    echo 1;
  }
  
  public function chang()
  {
      $qsid=I('get.qsid');
      //$is_delete=M('blog_article')->where("art_qsid=$qsid");
      //echo $is_delete;die;
      $arr=M('article')->where("art_qsid=".$qsid)->find();
      $arr['content']=I('post.content','','stripslashes');
      $is_delete=$arr["is_delete"];
      if($is_delete){
        $is_delete=0;
      }else{
        $is_delete=1;
      }
      $data['is_delete']=$is_delete;//不加引号$is_delete
      $data['art_qsid']=$qsid;
      $re=D('Opus')->art_save($data);//执行修改 
      //echo M('blog_article')->where("art_qsid=$qsid")->find();
      if($is_delete=='0'){
        echo "前台已显示";
       }else{
        echo "<span style='color: red; font-weight: bold'>前台未显示</span>";
      }
  }
  public function save_art_pro()
  {
     $qsid=$_POST['art_qsid'];
     $data=I('post.');
     $upload = new \Think\Upload();// 实例化上传类    
     $upload->maxSize   =     11111111 ;// 设置附件上传大小    
     $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
     $img_src=$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件 
     $upload->rootPath  = "./";    
     $info   =   $upload->upload(); 
    
          $file=$info['source_img']['savepath'].$info['source_img']['savename'];
          $image = new \Think\Image(); 
          //var_dump($image);die;
          $image->open($file);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          $image->thumb(150, 150)->save('./Public/thumb/'.$info['source_img']['savename']);
          $data['thumb_img']='/Public/thumb/'.$info['source_img']['savename'];
          $data['source_img']=substr($file,1);
          $data['title']=$_POST['title'];
          $data['content']=$_POST['content'];
          $data['author']=$_POST['author'];
          $data['art_desc']=I('post.art_desc');
          /*$data['source_img']=$_POST['source_img'];*/
          $data['cate_qsid']=$_POST['cate_qsid'];
          $data['add_time']=date('Y-m-d H:i:s');
          $data['is_delete']=1;

          $re=M('article')->where("art_qsid=".$qsid)->save($data);
         
          if ($re>0)
          {
              echo "<script>location='".U('Opus/opus_con')."';</script>";             

          }
          else
          {
            $this->error('修改失败');
          }
    }
    public function show_title()
    {

      $qsid=$_GET['qsid'];

      $data=M('qs')->where("qsid=$qsid")->find();
     
      for($i=0;$i<count($data);$i++)
       {
        if (Strlen($data['qstext'])>9) {
          $data['qstext']=substr_replace($data['qstext'], '...', 9);//substr_replace(‘从什么中替换’,’替换成谁’,从第几位开始)  必须添加判断否则超过9位字符串的位置被替换成了... 没超过9位的字符串后面也会跟着...
         
        }
        
       }
      $this->assign('data',$data);
      $this->display();

    }

}
