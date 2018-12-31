$(document).ready(function(){
	const usuario_r = /^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/;
	const nom_ape_r = /^[a-zA-Z]{1,}(\s[a-zA-Z]{1,})?$/;
	const correo_r = /^[a-zA-Z][a-zA-Z0-9]{1,}((\.|_)[a-zA-Z0-9]{1,})*?@[a-zA-Z]{1,}\.[a-zA-Z]{1,}$/;
	const clave_r = /^[\w][^\'$"]{1,30}$/;
	$("#clave,#confirm_clave").on('input',function(){
		if($(this).val() != ""){
			if($(this).val().length > 30){
				$(this).val($(this).val().slice(0,30));
			}
			if($("#clave").val() != "" && $("#confirm_clave").val() != ""){
				if($("#clave").val() != $("#confirm_clave").val() || $("#confirm_clave").val() != $("#clave").val() || !clave_r.test($(this).val())){
					$("#clave,#confirm_clave").addClass("mal-input");
					$("#clave,#confirm_clave").prev().addClass("mal-label");
				} else{
					$("#clave,#confirm_clave").removeClass("mal-input");
					$("#clave,#confirm_clave").prev().removeClass("mal-label");
				}
			} else{
				$("#clave,#confirm_clave").removeClass("mal-input");
				$("#clave,#confirm_clave").prev().removeClass("mal-label");
			}
		} else{
			$(this).removeClass("mal-input");
			$(this).prev().removeClass("mal-label");
		}
	});
	$('.form').on('submit',function(e){
		if($("#usuario,#nombre,#apellido,#correo,#clave,#confirm_clave").val() == "" || !usuario_r.test($("#usuario").val()) || !nom_ape_r.test($("#nombre").val()) || !nom_ape_r.test($("#apellido").val()) || !correo_r.test($("#correo").val()) || !clave_r.test($("#clave").val()) || !clave_r.test($("#confirm_clave").val()) || $("#clave").val() != $("#confirm_clave").val()){
			console.log("Campos erroneos.");
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