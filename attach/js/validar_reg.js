$(document).ready(function(){
	const usuario_r = /^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/;
	const nom_ape_r = /^[a-zA-Z]{1,}(\s[a-zA-Z]{1,})?$/;
	const correo_r = /^[a-zA-Z][a-zA-Z0-9]{1,}((\.|_)[a-zA-Z0-9]{1,})*?@[a-zA-Z]{1,}\.[a-zA-Z]{1,}$/;
	$("#usuario").on('input',function(){
		if($(this).val() != ""){
			if(!usuario_r.test($(this).val())){
				$(this).addClass("mal-input");
				$(this).prev().addClass("mal-label");
			}else{
				$(this).removeClass("mal-input");
				$(this).prev().removeClass("mal-label");
			}
		} else{
			$(this).removeClass("mal-input");
			$(this).prev().removeClass("mal-label");
		}
	});
	$("#nombre,#apellido").on('input',function(){
		if($(this).val() != ""){
			if(!nom_ape_r.test($(this).val())){
				$(this).addClass("mal-input");
				$(this).prev().addClass("mal-label");
			}else{
				$(this).removeClass("mal-input");
				$(this).prev().removeClass("mal-label");
			}
		} else{
			$(this).removeClass("mal-input");
			$(this).prev().removeClass("mal-label");
		}
	});
	$("#correo").on('input',function(){
		if($(this).val() != ""){
			if(!correo_r.test($(this).val())){
				$(this).addClass("mal-input");
				$(this).prev().addClass("mal-label");
			} else{
				$(this).removeClass("mal-input");
				$(this).prev().removeClass("mal-label");
			}
		} else{
			$(this).removeClass("mal-input");
			$(this).prev().removeClass("mal-label");
		}
	});
});