<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Http;


class IndexController extends Controller {

	  /**
     * [index description]
     * 前台展示页面
     */
    public function index(){
        $table = 'qs';
        $arr=D('qs')->sell($table);
        $page=$_GET['page']?$_GET['page']:1;
        $this->assign('page',$page);
      	$this->assign('arr',$arr[0]);
        $this->assign('str',$arr[1]);
      	$this->display();
    }
   //糗事趣闻
   public function qs()
   {
        //分页 
        $table = 'qs'; 
        $arr=D('qs')->sell($table);
        $page=$_GET['page']?$_GET['page']:1;
        $this->assign('page',$page);
        $this->assign('arr',$arr[0]);
        $this->assign('str',$arr[1]);
        $this->display();
   }

   //糗事趣闻下载
   public function xiazai()
   {
      
      //$date = $res['qstext'];
      $qsid = $_GET['qsid'];
      //echo $qsid;die;
           if( $qsid == 0 ){
              $this -> error( '文件不存在' );
           }
           $url='Txt/'.$qsid.'.txt';
           $db_file = M( 'qs' );
           $condition [ 'qsid' ] = $qsid;
           $file_result = M('qs')->where("qsid='$qsid'")->select();
           $re =  file_put_contents($url,$file_result[0]['qstext']);
           if(!file_exists($url)){
                  $this -> error( '文件不存在' );
           }
          // echo $url;die;
          $re =  file_put_contents($url,$file_result[0]['qstext']);
          //echo $re;die;
          if ($re) {
             //print "成功";
             $filename=realpath($url);  //文件名
             $date=date("Ymd-H:i:m");
             Header( "Content-type:   application/octet-stream ");
             Header( "Accept-Ranges:   bytes ");
             Header( "Accept-Length: " .filesize($filename));
             header( "Content-Disposition:   attachment;   filename= {$date}.doc");
             echo file_get_contents($filename);
             readfile($filename); 
          }else{
            print  "失败";
          }
   }
   //糗事详情页
   public function qsxq()
   {
      $qsid = $_GET['qsid'];
      $last = $this->last();
      //print_r($last);die;
      $next = $this->next();
      //访问量
      $res = M('qs')->where("qsid = $qsid")->setInc('qscomment');
      //var_dump($res);die;
      $data = M('qs')->where("qsid='$qsid'")->select();
      //var_dump($data);die;
      //最热门笑话
      $hot = M('qs')->order('qslike desc')->limit(3)->select();
      //最好笑糗图
      $tuhot = M('qsimg')->order('imglike desc')->limit(3)->select();
     // var_dump($hot);die;
      $this->assign('data',$data);
      $this->assign('last',$last);
      $this->assign('next',$next);
      $this->assign('hot',$hot);
      $this->assign('tuhot',$tuhot);
      $this->display();
   }
  


   /**
     * 上一篇
     */
     public function last(){
        //接收本篇章的qsid
        $qsid = I("get.qsid");
        //查询数据
        $qs = M('qs');
        $arr = $qs->select();
        //定义一个空数组
        $arr1 = array();
        //循环数据库查询出来的数据
        foreach($arr as $k=>$v){
            $arr1['qsid']=$v['qsid'];
            if($qsid==$arr1['qsid']){
             //判断如果不是第一条 就让他的K减1 根据得出的结果里的qsid查询数据库
                if($k!=0){
                    $key = $k-1;
                    $arr1['qsid']=$arr[$key]['qsid'];
                    $data = $qs
                        ->where("qsid='{$arr1['qsid']}'")
                        ->find();
                }
            }
        }
       // print_R($data);
        // die;
        return $data;
    }

    /**
     * 同理下一篇
     * @return function [description]
     */
    public function next(){
        $qsid = I("get.qsid");
        $qs = M('qs');
        $arr = $qs->select();
        $arr1 = array();
        foreach($arr as $k=>$v){
            $arr1['qsid']=$v['qsid'];
            if($qsid==$arr1['qsid']){
                $count = count($arr)-1;
                if($k!=$count){
                    $key = $k+1;
                    $arr1['qsid']=$arr[$key]['qsid'];
                    $data = $qs
                        ->where("qsid='{$arr1['qsid']}'")
                        ->find();
                }
            }
        }
        return $data;
    }

    //逗图 
    public function doutu()
    {
        $table = 'qsimg';
        $arr=D('qs')->sell($table);
        $page=$_GET['page']?$_GET['page']:1;
        $this->assign('page',$page);
        $this->assign('arr',$arr[0]);
        $this->assign('str',$arr[1]);
        $this->display();
    }
    //图片的分页
    
  public function con()
  { 
      $table = 'qsimg';
      $arr=D('qs')->sell($table);
     // var_dump($obj);die;
      $page=$_GET['page']?$_GET['page']:1;
      $this->assign('page',$page);  
      $this->assign('arr',$arr[0]);    
      $this->assign('str',$arr[1]); 
      $this->display('doutu');  
  }
    //图片下载
    public function imgxz()
    {
        //获取
        $url = $_GET['imgurl'];
        $filename =date("YmdHis");
        $res = $this->GrabImage($url,$filename);
        if($res){
          print "OK";
        }else{
          print "NO";
        }
    }

    /**
     * 通过图片的远程url，下载到本地
     * @param: $url为图片远程链接
     * @param: $filename为下载图片后保存的文件名
     */
    function GrabImage($url,$filename) {
               
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $v);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        $content = curl_exec($ch);
        $curlinfo = curl_getinfo($ch);
        //echo "string";
        //print_r($curlinfo);
        //关闭连接
        curl_close($ch);
            if ($curlinfo['http_code'] == 200) {
              if ($curlinfo['content_type'] == 'image/jpeg') {
                    $exf = '.jpg';
              }elseif ($curlinfo['content_type'] == 'image/png') {
                    $exf = '.png';
              }elseif ($curlinfo['content_type'] == 'image/gif') {
                    $exf = '.gif';
              }
              //存放图片的路径及图片名称 
              //$filename = date("YmdHis") . uniqid() . $exf;//这里默认是当前文件夹，可以加路径的 可以改为
              $filepath = 'Txt/'.$filename. $exf;
             // file_put_contents($filepath, $content);//同样这里就可以改为$res = file_put_contents($filepath, $content);
              if(file_put_contents($filepath, $content)){
                return true;
              }else{
                return false;
              }
          }

       } 

       //图片的一键下载
       public function allxz()
       {
          set_time_limit(0);
          $table = 'qsimg';
          $arr=M('qsimg')->select();
          $val=array();
          foreach ($arr as $key => $v) {
             $val[$key]=$v['imgurl'];
          }
        
          foreach($val as $imagesURL) {
              $filepath = 'Txt/'.basename($imagesURL);
              file_put_contents($filepath, file_get_contents($imagesURL));
              //print_r(file_get_contents($imagesURL))."</br>";
          }
          $this->display('qsimg');;
       }

  
}

