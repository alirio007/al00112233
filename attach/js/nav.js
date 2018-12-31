$(document).ready(function(){
	var me_conf = 1;
	$(".m-c").click(function(){
		if(me_conf){
			$(".li-config,.flecha").fadeIn(100);
			me_conf = 0;
		} else{
			$(".li-config,.flecha").fadeOut(100);
			me_conf = 1;
		}
	});
	$("html").click(function(){
		if(!me_conf){
	    	$(".li-config,.flecha").fadeOut(100);
			me_conf = 1;
		}
	});
	$(".m-c,.li-config").click(function(e){
		e.stopPropagation();
	});
});