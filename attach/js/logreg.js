$(document).ready(function(){
	/*
		Inputs y Labels del formulario
	*/
	//Animacion de subir y bajar el texto
	$(".box .bien-label,.box_doble .bien-label").click(function(){
		$(this).animate({
			top:0
		},200);
	});
	$(".box .bien-input,.box_doble .bien-input").focus(function(){
		$(this).prev().animate({
			top:0
		},200);
	});
	$(".box .bien-input,.box_doble .bien-input").focusout(function(){
		if($(this).val() == ""){
			$(this).prev().animate({
				top:38
			},200);
		}
	});
	$(".accion").click(function(e){e.preventDefault();});
});