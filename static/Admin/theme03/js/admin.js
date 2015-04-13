$(function(){
	/*初始化菜单*/
	$(".side-menue-list").each(function(){
		leftMenueShow($(this));
	});
	/*菜单增加click事件*/
	$(".side-menue-list").on('click',function(){
		leftMenueShow($(this));
	});
	/* 删除确认操作*/
	$(".del-icon").parent('a').on('click',function(){
		if(confirm('您确认要执行删除操作吗？')){
			return true;
		}else{
			return false;
		}
	})
	/* 必填选项 如果是必填的，则加红星标识. */
	 
    $("form td.required").each(function(){  
        var $required = $('<font color="red">*</font>'); //创建元素  
        $(this).append($required); //然后将它追加到文档中  
    });  
})
/*左边菜单*/
function leftMenueShow(obj){
	
	if(obj.hasClass('active')){
					obj.removeClass("active");
					obj.next().hide();
	}else{
					obj.addClass("active");
					obj.next().show();
	 }  		
	
}
/* 更改序列*/
function changeListorder(apiUrl,formId){
	
	  $('#'+formId).attr('action',apiUrl);
	  if(confirm('您确认执行此操作吗？')){
		
		  $('#'+formId).submit();
		
	  }
}
/* 更改状态 */
function changeStatus(apiUrl,data){
	
	 
	  if(confirm('您确认执行此操作吗？')){
		 
		  $.post(apiUrl,data,function(obj){
			  if(obj.status == 0){
				  alert('操作失败')
			  }else{
				  location.reload();
			  }
		  },'json')
	  }
}
