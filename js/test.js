function eventoEleg(opc){

	$('.info').css('display','none');
	var element=$(opc);
	var text=element.attr('name');

	$('.info').each(function(){
		var aux=$(this);
		if(aux.attr('id').indexOf(text)!= -1){
			aux.css('display','inherit');
		}
	})
	
}

function aprobado(opc){
	actualizar(opc);			
}

function rechazado(opc){
	switch(opc){
		case 1: formNvo = document.createElement("form");
				formNvo.id = "formrechazar1"; 
  				infohackers.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea1";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);

 				campo =document.createElement("textarea");	
 				campo.id = "textarea1";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
				
				enviar = document.createElement("button"); 
  				enviar.type = "submit"; 
  				enviar.innerHTML = "enviar comentario";
  				enviar.onclick = function () {actualizar(opc)}      			
  				formNvo.appendChild(enviar); 
				evitar = document.createElement("button"); 
  				evitar.type = "button"; 
  				evitar.innerHTML = "no enviar comentario";
  				evitar.onclick = function () {actualizar(opc)}    
  				formNvo.appendChild(evitar); 	
  			break;
  		case 2: formNvo = document.createElement("form");
				formNvo.id = "formrechazar2"; 
  				infocotorreo.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea2";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);
 				
 				campo =document.createElement("textarea");	
	 			campo.id = "textarea2";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
			
				enviar = document.createElement("button"); 
  				enviar.type = "submit"; 
  				enviar.innerHTML = "enviar comentario";   
				enviar.onclick = function () {actualizar(opc)}      			
  				formNvo.appendChild(enviar); 
				evitar = document.createElement("button"); 
  				evitar.type = "button"; 
  				evitar.innerHTML = "no enviar comentario";
  				evitar.onclick = function () {actualizar(opc)}    
  				formNvo.appendChild(evitar); 	
  			break;
		case 3: formNvo = document.createElement("form");
				formNvo.id = "formrechazar3"; 
  				infoparty.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea3";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);
 				
 				campo =document.createElement("textarea");	
	 			campo.id = "textarea3";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
			
				enviar = document.createElement("button"); 
  				enviar.type = "submit"; 
  				enviar.innerHTML = "enviar comentario";
  				enviar.onclick = function () {actualizar(opc)}      			
  				formNvo.appendChild(enviar); 
				evitar = document.createElement("button"); 
  				evitar.type = "button"; 
  				evitar.innerHTML = "no enviar comentario";
 				evitar.onclick = function () {actualizar(opc)}    
  				formNvo.appendChild(evitar);
  			break;
	}
}

function actualizar(opc){
	switch (opc){
		case 1: eliminar = document.getElementById("lshackers");
				eliminar.parentNode.removeChild(eliminar);
				eliminar2 = document.getElementById("btnhackers");
				eliminar2.parentNode.removeChild(eliminar2);
				eliminar3 = document.getElementById("infohackers");
				eliminar3.parentNode.removeChild(eliminar3);
				eliminar4 = document.getElementById("formrechazar1");
				eliminar4.parentNode.removeChild(eliminar4);
			break;	
		case 2: eliminar = document.getElementById("lscotorreo");
				eliminar.parentNode.removeChild(eliminar);
				eliminar2 = document.getElementById("btncotorreo");
				eliminar2.parentNode.removeChild(eliminar2);
				eliminar3 = document.getElementById("infocotorreo");
				eliminar3.parentNode.removeChild(eliminar3);
				eliminar4 = document.getElementById("formrechazar2");
				eliminar4.parentNode.removeChild(eliminar4);
			break;
		case 3: eliminar = document.getElementById("lsparty");
				eliminar.parentNode.removeChild(eliminar);
				eliminar2 = document.getElementById("btnparty");
				eliminar2.parentNode.removeChild(eliminar2);
				eliminar3 = document.getElementById("infoparty");
				eliminar3.parentNode.removeChild(eliminar3);
				eliminar4 = document.getElementById("formrechazar3");
				eliminar4.parentNode.removeChild(eliminar4);
			break;
	}	
}
/*
enviarComent(opc){
	switch(opc){
		case 1: areaTexto= document.getElementById("textarea");
			if(areaTexto.length == 0 || /^\s+$/.test(areaTexto)){
				document.formrechazar1.submit();
				actualizar(opc);	
			} 
			else{
				areaTexto.value = "Necesita escribir un comentario";
			}
			break;
		case 2: areaTexto= document.getElementById("textarea");
			if(areaTexto.length == 0 || /^\s+$/.test(areaTexto)){
				document.formrechazar2.submit();
				actualizar(opc);	
			} 
			else{
				areaTexto.value = "Necesita escribir un comentario";
			}
			break;
		case 3: areaTexto= document.getElementById("textarea");
			if(areaTexto.length == 0 || /^\s+$/.test(areaTexto)){
				document.formrechazar3.submit();
				actualizar(opc);	
			} 
			else{
				areaTexto.value = "Necesita escribir un comentario";
			}
			break;
				
				
		
	}
}*/

function admModificar(opc){
	window.open("edita.html","_self");
}