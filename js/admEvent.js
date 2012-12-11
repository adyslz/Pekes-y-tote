/**
*Funcion que muestra la informacion de los eventos
segun la seleccion.
opc es el elemento que fue clickeado
en el html encontraras eventoEleg(this)
mandando como argumento el elemento
*/
function eventoEleg(opc){

	/*Esta linea aplica un cambio al css
	el primer argumento es el atributo que se cambiara
	y el segundo el valor que se asigna
	con la primera linea mando a llamar a todos
	los elementos que tienen la clase info.
	(agregue la clase info a tus elementos info)
	*/
	$('.info').css('display','none');
	/*con esta linea convierto el elemento que fue clickeado
	en un elemento de jquery para poder usar el metodo attr
	*/
	var element=$(opc);
	/*
	attr te permite cambiar el valor de un atributo 
	de un tag mandando .attr('atributo','nuevovalor')
	o recuperarlo solo con .attr('atributo')*/
	var text='info'+element.attr('name');
	$('#'+text).css('display','inherit');
}

function rechazado(element){
	var este=$(element);
	text=este.parents('.info').attr('id').substring('4');
	var comentario=prompt('seguro que deseas rechazar? por favor comenta algo si aceptas.')
	if(comentario){
		$.ajax({ url: '/pekes-tote/php/crud_evento.php',
			data: {crud_action: 'changeStatus',comment:comentario, idEvento:text,stat:2},
		 	type: 'post',
		 	success: function(html){
					window.location.reload();
				},
				error:function(html){
					console.log('damn...'+html);
				}
			});

	}

}

function aprobado(element){
	var este=$(element);
	text=este.parents('.info').attr('id').substring('4');
	
	$.ajax({ url: '/pekes-tote/php/crud_evento.php',
		data: {crud_action: 'changeStatus', idEvento:text,stat:3},
	 	type: 'post',
	 	success: function(html){
				window.location.reload(); 		
			},
			error:function(html){
				console.log('damn...'+html);
			}
		});
}


function admModificar(element){
	var este=$(element);
	text=este.parents('.info').attr('id').substring('4');

	var form = document.createElement("form");
    form.setAttribute("method", 'post');
    form.setAttribute("action", 'edita.php');
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", 'idEventoToUpdate');
    hiddenField.setAttribute("value",text);
    form.appendChild(hiddenField);
    document.body.appendChild(form);
    form.submit();
}