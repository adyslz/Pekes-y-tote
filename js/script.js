function switchImg(el){
	var element=$(el);
	if(element.attr('src')=='img/up-circle.png'){
		element.attr('src','img/down-circle.png');
		console.log(element.siblings('.desc').css('display','none'));

	}else{
		console.log(element.siblings('.desc').css('display','block'));
		element.attr('src','img/up-circle.png');
	}
	console.log(element);
}

function borrar(el){
	var elemento=$(el);
	var val=elemento.parent().attr('id');
	val=val.substring(8);
	var cfm=confirm("seguro que deseas borrar el evento?");
	if(cfm){
			$.ajax({ url: '/pekes-tote/php/crud_evento.php',
        	data: {crud_action: 'delete', idEvento:val},
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


function editar(el){
	console.log("editar");
	var form = document.createElement("form");
    form.setAttribute("method", 'post');
    form.setAttribute("action", 'edita.php');
    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", 'idEventoToUpdate');
    var elemento=$(el);
	var val=elemento.parent().attr('id');
	val=val.substring(8);
    hiddenField.setAttribute("value",val);
    form.appendChild(hiddenField);
    document.body.appendChild(form);
    form.submit();

}