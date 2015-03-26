$(".side-menue-list").on('click',function(){
	leftMenueShow($(this));
});
//leftMenueShow($(".side-menue-list").eq(0))
function leftMenueShow(obj){
	
	if(obj.hasClass('active')){
					obj.removeClass("active");
					obj.next().hide();
	}else{
					obj.addClass("active");
					obj.next().show();
	 }  		
	
}