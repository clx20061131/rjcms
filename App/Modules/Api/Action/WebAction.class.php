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
    		
    		$rst = file_put_contents($endFile,$html);
    		if($rst){
    			$this->downStaticFile($endFile);
    			echo $fileName."下载完成";
    			
    		}else{
    			echo "失败";
    		}
 
    	}
    	$this->display('t:copy');
    }
  public  function downStaticFile($file='Upload/download/html/2114.html'){
   	    //$content = file_get_contents($file);
    	import('Com.PhpQuery.Query');   	
        $doc = Query::newDocumentFile($file);
        
  
		
   }
}