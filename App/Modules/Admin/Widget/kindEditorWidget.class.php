<?php
class kindEditorWidget extends Widget{
	/**
	 * $data[]
	 * name='' 表单name值
	 * fileType='' 上传文件类型
	 * data='' 默认值
	 * @see Widget::render()
	 */
	public function render($data=array()){
		if(is_array($data)){
			if(isset($data['type'])){
				switch($data['type']){
					case 'editor':
						$content = $this->renderFile('editor',$data);
						return $content;
						break;
					case 'upload':						
						$content = $this->renderFile('upload',$data);
						return $content;
						break;
					case 'images':
						$content = $this->renderFile('images',$data);
						return $content;
						break;
				}
			}else{
				return '<font color="red">请在参数中输入类别type值</font>';
			}
		}else{
			return '<font color="red">请输入参数</font>';
		}
	}
}