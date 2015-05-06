<?php
// 本类由系统自动生成，仅供测试用途
class WebAction extends Action {
	public $downloadHtml = './Upload/download/html/';
    public function index(){
    	
    }
    
    public function copy(){
    	if(IS_POST){
    		$url = I('post.url');
    		$fileName = I('post.fileName',time(),'trim');
    		
    		$html = file_get_contents($url);
    		$endFile = $this->downloadHtml.$fileName.'.html';
    		$domain = $this->getHost($url);
    		$rst = file_put_contents($endFile,$html);
    		if($rst){
    			$this->downStaticFile($endFile,$domain);
    			echo $fileName."下载完成";
    			
    		}else{
    			echo "失败";
    		}
 
    	}
    	$this->display('t:copy');
    }
   public  function downStaticFile($html='./Upload/download/html/2114.html',$domain){
        $rst = file_get_contents($html);
       
       preg_match_all('/src=\s*(\"|\')((\w|\d|\.|\-|\/)*\.(js|css))(\"|\')\s*/',$rst,$out);
       foreach($out[2] as $key =>$val){
       	  
       	  if($this->getHost($val)){
       	  	file_put_contents(file_get_contents($val),)
       	  }
       }
  
		
   }
   public function getHost($url){
   	
   	preg_match('/^([a-z0-9]+([a-z0-9-]*(?:[a-z0-9]+))?\.)?[a-z0-9]+([a-z0-9-]*(?:[a-z0-9]+))?(\.us|\.tv|\.org\.cn|\.org|\.net\.cn|\.net|\.mobi|\.me|\.la|\.info|\.hk|\.gov\.cn|\.edu|\.com\.cn|\.com|\.co\.jp|\.co|\.cn|\.cc|\.biz)$/i', $domain);
    return $domain;
   }
}