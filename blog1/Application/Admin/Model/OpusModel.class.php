<?php
namespace Admin\Model;
use Think\Model;
class OpusModel extends Model 
	{
		protected $tableName = 'qs'; 
		public function selall($where)
		{
            $count=M('qs')->count();
	        $page_size=20;
	        $page_num=ceil($count/$page_size);
	        $page=$_GET['page']?$_GET['page']:1;
	        $page_limit=($page-1)*$page_size;
	        $last=$page-1<=1?1:$page-1;
	        $next=$page+1>=$page_num?$page_num:$page+1;
			$arr=M('qs')->where($where)->limit($page_limit,$page_size)->select();
			$count=M('qs')->count();

			 $first="<a href='javascript:void(0)' onclick='fun(1)'>首页</a>";
	        $last="<a href='javascript:void(0)' onclick='fun($last)'>上一页</a>";
	        for ($i=1; $i <=$page_num ; $i++) { 
	            $page_i.="<a href='javascript:void(0)' onclick='fun($i)'>$i</a>"."&nbsp;&nbsp;&nbsp;&nbsp;";
	        }
	        $next="<a href='javascript:void(0)' onclick='fun($next)'>下一页</a>";
	        $end="<a href='javascript:void(0)' onclick='fun($page_num)'>尾页</a>";
	        $str='';
	        $str.=$first.$last.$page_i.$next.$end;
	        return $arr=array($arr,$str);
			
			//return M('blog_article')->select();
		}
		public function checktype($tian)
		{
			 if (!empty($tian)) {
				$where="qstext like '%$tian%'";
			}else{
				$where = '';
			}
			return $arr=M('qs')->where($where)->select();
		}

		public function del($id)
		{
			return M('qs')->delete($id);
		}
		public function art_save($data)
		{
			return M('qs')->save($data);
		}
		
	}
	
?>