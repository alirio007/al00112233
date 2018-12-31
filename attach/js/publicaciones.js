$(document).ready(function(){
	var btn_cont = [];
	var btnContCreation= function(cantidad){
		for(var i = 1;i <= cantidad;i++){
			var nombre = "cont" + i;
		    btn_cont["cont"+i] = 1;
		}
		return btn_cont;
	}
	btnContCreation($(".publicacion").length);
	$(".publi-opciones-btn").on("click",function(){
		var atributo_id_publicaciones = $(this).parent().parent().attr("id");
		var numero_publicacion = atributo_id_publicaciones.slice(11);
		var indice = "cont"+numero_publicacion;
		if(btn_cont[indice]){
			$(this).parent().next().slideDown(400);
			btn_cont[indice] = 0;
		} else{
			$(this).parent().next().slideUp(300);
			btn_cont[indice] = 1;
		}
	})
});