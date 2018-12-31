$(document).ready(function(){
	/*
		Variables y constantes que se usaran posteriormente
	*/
	const usuario_r = /^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/;
	const nom_ape_r = /^[a-zA-Z]{1,}(\s[a-zA-Z]{1,})?$/;
	const correo_r = /^[a-zA-Z][a-zA-Z0-9]{1,}((\.|_)[a-zA-Z0-9]{1,})*?@[a-zA-Z]{1,}\.[a-zA-Z]{1,}$/;
	const clave_r = /^[\w][^\'$"]{1,30}$/;
	var id_usuario;
	/*
		Animaciones variadas
	*/
	$("html").click(function(){
		if($(".agregar-usuario, .control-ejecucion").is(":visible")){
			$(".agregar-usuario, .control-ejecucion").fadeOut(300);
		}
	});
	$(".agregar-usuario form,#agregar-usuario,.opcion-editar,.control-ejecucion div").click(function(e){
		e.stopPropagation();
	});
	/*
		Funcion eliminar
	*/
	function eliminar(borrar){
		$.ajax({
			url: 'editar_agregar.php',
			type: 'POST',
			data: borrar
		})
		.done(function($res){
			$(".control-ejecucion").fadeIn(300).delay(2000).fadeOut(300);
		});
	};
	$(".opcion-eliminar").click(function(){
		id_usuario = $(this).attr('id').slice(3);
		id_usuario = {
			"borrar": id_usuario
		}
		eliminar(id_usuario);
	});
	$(".form-eliminar-usuario").on('submit',function(e){
		e.preventDefault();
		if($("input[type=checkbox]").is(':checked')){
			id_usuario = $(".form-eliminar-usuario").serializeArray();
			eliminar(id_usuario);
		}
	});
	/*
		Funciones editar o agregar usuario
	*/
	//Agregar
	$("#agregar-usuario").click(function(){
		$(".agregar-usuario").show(300);
		$("#input-tipo").val('reg');
		$("#input-id").val('');
		$(".wrap_box input").val('');
	});
	//Editar
	$(".opcion-editar").click(function(){
		$(".form-control-usuario p").text("Editar datos");
		id_usuario = $(this).attr('id').slice(4);
		$(".agregar-usuario").show(300);
		$("#input-tipo").val('edit');
		$("#input-id").val(id_usuario);
		//Buscar datos del usuario en la tabla
		$(this).parent().prevUntil('.privilegio').each(function(){
			const campo_usuario = $(this).attr('class').slice(5);
			$("#"+campo_usuario).val($(this).text());
		});
	});
	$("#clave").on('input',function(){
		if($(this).val() != ""){
			if($(this).val().length > 30){
				$(this).val($(this).val().slice(0,30));
			}
			if($(this).val() != ""){
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
		} else{
			$(this).removeClass("mal-input");
			$(this).prev().removeClass("mal-label");
		}
	});
	$('.form-control-usuario').on('submit',function(e){
		e.preventDefault();
		if($("#usuario,#nombre,#apellido,#correo,#clave").val() == "" || !usuario_r.test($("#usuario").val()) || !nom_ape_r.test($("#nombre").val()) || !nom_ape_r.test($("#apellido").val()) || !correo_r.test($("#correo").val()) || !clave_r.test($("#clave").val())){
			console.log("Campos erroneos.");
		} else{
			$.ajax({
				url: 'editar_agregar.php',
				type: 'POST',
				dataType: 'json',
				data: $(this).serializeArray(),
				beforeSend: function() {
					$('.fa-spin').fadeIn(300);
				}
			})
			.done(function($r){  //true
				$('.res').fadeIn(300).text("Registrado").delay(2500).fadeOut(300);
				console.log($r);
				//var intervalo = setTimeout(borrar, 3000);
			})
			.fail(function(){  //false
				$('.res').fadeIn(300).text("Error").delay(2500).fadeOut(300);
				//var intervalo = setTimeout(borrar, 3000);
			})
			.always(function(){
				$('.fa-spin').hide();
			});
		}
	});
});