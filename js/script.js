function switchImg(el){
	var element=$(el);
	if(element.attr('src')=='img/up-circle.png'){
		element.attr('src','img/down-circle.png');
		console.log(element.siblings('p').css('display','none'));

	}else{
		console.log(element.siblings('p').css('display','block'));
		element.attr('src','img/up-circle.png');
	}
	console.log(element);
}

function borrar(el){
	var form=$('#borrarForm');
	var elemento=$(el);
	$('#idEventoField').val(elemento.parent().attr('id'));
	//form.submit();
	console.log('form submit con nuevo valor '+$(form[0].elements[0]).val()
)
	//TODO remove from database code
	elemento.parent().remove();
}


function editar(el){
	//abrira una nueva pagina donde estara el form
}