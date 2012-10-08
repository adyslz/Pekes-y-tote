function eventoEleg(opc){
	document.getElementById("infohackers").style.display='none';
	document.getElementById("infocotorreo").style.display='none';
	document.getElementById("infoparty").style.display='none';
	
	switch (opc){
		case 1: document.getElementById("infohackers").style.display='inherit';	
			break;
		case 2: document.getElementById("infocotorreo").style.display='inherit';
			break;
		case 3: document.getElementById("infoparty").style.display='inherit';
			break;
	}
}

function aprobado(opc){
	actualizar(opc);			
}

function rechazado(opc){
	switch(opc){
		case 1: formNvo = document.createElement("form");
				formNvo.id = "formrechazar"; 
  				infohackers.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);

 				campo =document.createElement("textarea");	
 				campo.id = "textarea";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
				
				enviar = document.createElement("button"); 
  				enviar.type = "button"; 
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
				formNvo.id = "formrechazar"; 
  				infocotorreo.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);
 				
 				campo =document.createElement("textarea");	
	 			campo.id = "textarea";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
			
				enviar = document.createElement("button"); 
  				enviar.type = "button"; 
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
				formNvo.id = "formrechazar"; 
  				infoparty.appendChild(formNvo); 
				etiqueta = document.createElement("label");
				etiqueta.for = "textarea";
				etiqueta.innerHTML = "<br />Comentarios";
				formNvo.appendChild(etiqueta);
 				
 				campo =document.createElement("textarea");	
	 			campo.id = "textarea";
				campo.rows = "5";
				campo.cols = "50";
				campo.style.marginLeft="87px";
				formNvo.appendChild(campo);
			
				enviar = document.createElement("button"); 
  				enviar.type = "button"; 
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
				eliminar4 = document.getElementById("formrechazar");
				eliminar4.parentNode.removeChild(eliminar4);
			break;	
		case 2: eliminar = document.getElementById("lscotorreo");
				eliminar.parentNode.removeChild(eliminar);
				eliminar2 = document.getElementById("btncotorreo");
				eliminar2.parentNode.removeChild(eliminar2);
				eliminar3 = document.getElementById("infocotorreo");
				eliminar3.parentNode.removeChild(eliminar3);
				eliminar4 = document.getElementById("formrechazar");
				eliminar4.parentNode.removeChild(eliminar4);
			break;
		case 3: eliminar = document.getElementById("lsparty");
				eliminar.parentNode.removeChild(eliminar);
				eliminar2 = document.getElementById("btnparty");
				eliminar2.parentNode.removeChild(eliminar2);
				eliminar3 = document.getElementById("infoparty");
				eliminar3.parentNode.removeChild(eliminar3);
				eliminar4 = document.getElementById("formrechazar");
				eliminar4.parentNode.removeChild(eliminar4);
			break;
	}	
}

function admModificar(opc){
	window.open("admModificar.html","_self");
}