<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

defined('THINK_PATH') or exit();
/**
 * CX标签库解析类
 * @category   Think
 * @package  Think
 * @subpackage  Driver.Taglib
 * @author    liu21st <liu21st@gmail.com>
 */
class TagLibClx extends TagLib {

    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
        
        'content'    =>  array('attr'=>'table,where,num,orderBy','level'=>3)
      

	);

   
    public function _content($attr,$content) {
     
        static $_iterateParseCache = array();
       
        //如果已经解析过，则直接返回变量值
        $cacheIterateId = md5($attr.$content);
        if(isset($_iterateParseCache[$cacheIterateId]))
            return $_iterateParseCache[$cacheIterateId];
        $tag   =    $this->parseXmlAttr($attr,'content');
        $table  =    $tag['table'];
        $where    =    $tag['where'];
        $num =    isset($tag['num'])?$tag['num']:10;
        $orderBy = isset($tag['orderBy'])?$tag['orderBy']:'id desc';
        $Model = M($table);
        $__LIST__ = $Model ->where($where)->order($orderBy)->limit($num)->select();
     
        //
        $parseStr   =  '<?php $__LIST__ = \''.encode_json($__LIST__).'\';$__LIST__ = decode_json($__LIST__,true);';
        $parseStr .= 'if ($__LIST__){';
        $parseStr .= 'foreach($__LIST__ as $key=>$val){?>';
        $parseStr .= $this->tpl->parse($content);
        $parseStr .= '<?php }} ?>';
      
        $_iterateParseCache[$cacheIterateId] = $parseStr;
        if(!empty($parseStr)) {
            return $parseStr;
        }
        return ;
    }



    }
