$(document).ready(function(){
	var usuario_r = /^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/;
	var clave_r = /^[\w]{1,}([\da-zA-Z0-9-_\.,\*\+\/()=@])*$/;
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
	$("#clave").on('input',function(){
		if($(this).val() != ""){
			if($(this).val().length > 30){
				$(this).val($(this).val().slice(0,30));
			}
			if(!clave_r.test($(this).val())){
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
	$('.form').on('submit',function(e){
		if($("#usuario,#clave").val() == "" || !usuario_r.test($("#usuario").val()) || !clave_r.test($("#clave").val())){
			console.log("Campos erroneos");
			e.preventDefault();
		}/* else{
			$.ajax({
				type: "POST",                 
				url: 'sesion/procesar.php',                    
				data: $(".form").serialize(),
				beforeSend: function() {
					$(".fa-spin").fadeIn('slow');
				},
				success: function($data){
					$(".fa-spin").fadeOut('slow');
					console.log($data);
				}
			});
		}*/
	});
});