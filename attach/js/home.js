$(document).ready(function(){
	var letras = function(){
		$(".ti-box-mo").animate({
			'margin':'50px auto 0 auto'
		},1000, function(){
			$(".ti-box-mo").animate({
				'margin':'0 auto 0 auto'
			},1000);
		});

		$(".ti-sombra").animate({
	    	'height':'30px',
	    	'width':'250px'
	    }, 1000, function(){
	    	$(".ti-sombra").animate({
		    	'height':'20px',
		    	'width':'150px'
		    }, 1000);
	    }); 
	}
	var intervalo = setInterval(letras, 2165);
});