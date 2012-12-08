<?


session_start();
        
	$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   if(!isset($_SESSION['access_token'])){
   	header("location: /pekes-tote/secciones/login.php?authenticate=1&force=1");
   }

   $query="select * from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
   $dato[]=select($query);

function mysql_XML($resultado, $nombreDoc='resultados', $nombreItem='item') {
	$campo = array();
	
	// llenamos el array de nombres de campos
	for ($i=0; $i<mysql_num_fields($resultado); $i++)
		$campo[$i] = mysql_field_name($resultado, $i);
	
	// creamos el documento XML	
	$dom = new DOMDocument('1.0', 'UTF-8');
	$doc = $dom->appendChild($dom->createElement($nombreDoc));
	
	// recorremos el resultado
	for ($i=0; $i<mysql_num_rows($resultado); $i++) {
		
		// creamos el item
		$nodo = $doc->appendChild($dom->createElement($nombreItem));
		
		// agregamos los campos que corresponden
		for ($b=0; $b<count($campo); $b++) {
			$campoTexto = $nodo->appendChild($dom->createElement($campo[$b]));
			$campoTexto->appendChild($dom->createTextNode(mysql_result($resultado, $i, $b)));
		}
	}
	
	// retornamos el archivo XML como cadena de texto
	$dom->formatOutput = true; 
	return $dom->saveXML();    
}
?>
