function hab(){
	if(document.getElementById("limitada").checked){
		document.getElementById("cap").disabled ="";
		document.getElementById("errCap2").style.display ="inline";
		}
	else{
		document.getElementById("cap").disabled ="disable";
		document.getElementById("cap").value ="";
		document.getElementById("errCap2").style.display ="none";
		document.getElementById("errCap").style.display ="none";
		}
	}
	
function hab2(){
	if(document.contactForm.capacidad[1].checked){
		document.getElementById("cap").disabled ="";
		document.getElementById("errCap2").style.display ="inline";
		}
	else{
		document.getElementById("cap").disabled ="disable";
		document.getElementById("cap").value ="";
		document.getElementById("errCap2").style.display ="none";
		document.getElementById("errCap").style.display ="none";
		}
	}
function date (format, timestamp) {

    var that = this,
        jsdate, f, formatChr = /\\?([a-z])/gi,
        formatChrCb,
        // Keep this here (works, but for code commented-out
        // below for file size reasons)
        //, tal= [],
        _pad = function (n, c) {
            if ((n = n + '').length < c) {
                return new Array((++c) - n.length).join('0') + n;
            }
            return n;
        },
        txt_words = ["Sun", "Mon", "Tues", "Wednes", "Thurs", "Fri", "Satur", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    formatChrCb = function (t, s) {
        return f[t] ? f[t]() : s;
    };
    f = {
        // Day
        d: function () { // Day of month w/leading 0; 01..31
            return _pad(f.j(), 2);
        },
        D: function () { // Shorthand day name; Mon...Sun

            return f.l().slice(0, 3);
        },
        j: function () { // Day of month; 1..31
            return jsdate.getDate();
        },
        l: function () { // Full day name; Monday...Sunday
            return txt_words[f.w()] + 'day';
        },
        N: function () { // ISO-8601 day of week; 1[Mon]..7[Sun]
            return f.w() || 7;
        },
        S: function () { // Ordinal suffix for day of month; st, nd, rd, th
            var j = f.j();
            return j > 4 && j < 21 ? 'th' : {1: 'st', 2: 'nd', 3: 'rd'}[j % 10] || 'th';
        },
        w: function () { // Day of week; 0[Sun]..6[Sat]
            return jsdate.getDay();
        },
        z: function () { // Day of year; 0..365
            var a = new Date(f.Y(), f.n() - 1, f.j()),
                b = new Date(f.Y(), 0, 1);
            return Math.round((a - b) / 864e5) + 1;
        },
 
        // Week
        W: function () { // ISO-8601 week number
            var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3),
                b = new Date(a.getFullYear(), 0, 4);
            return _pad(1 + Math.round((a - b) / 864e5 / 7), 2);
        },
 
        // Month
        F: function () { // Full month name; January...December
            return txt_words[6 + f.n()];
        },
        m: function () { // Month w/leading 0; 01...12
            return _pad(f.n(), 2);
        },
        M: function () { // Shorthand month name; Jan...Dec
            return f.F().slice(0, 3);
        },
        n: function () { // Month; 1...12
            return jsdate.getMonth() + 1;
        },
        t: function () { // Days in month; 28...31
            return (new Date(f.Y(), f.n(), 0)).getDate();
        },
 
        // Year
        L: function () { // Is leap year?; 0 or 1
            return new Date(f.Y(), 1, 29).getMonth() === 1 | 0;
        },
        o: function () { // ISO-8601 year
            var n = f.n(),
                W = f.W(),
                Y = f.Y();
            return Y + (n === 12 && W < 9 ? -1 : n === 1 && W > 9);
        },
        Y: function () { // Full year; e.g. 1980...2010
            return jsdate.getFullYear();
        },
        y: function () { // Last two digits of year; 00...99
            return (f.Y() + "").slice(-2);
        },
 
        // Time
        a: function () { // am or pm
            return jsdate.getHours() > 11 ? "pm" : "am";
        },
        A: function () { // AM or PM
            return f.a().toUpperCase();
        },
        B: function () { // Swatch Internet time; 000..999
            var H = jsdate.getUTCHours() * 36e2,
                // Hours
                i = jsdate.getUTCMinutes() * 60,
                // Minutes
                s = jsdate.getUTCSeconds(); // Seconds
            return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3);
        },
        g: function () { // 12-Hours; 1..12
            return f.G() % 12 || 12;
        },
        G: function () { // 24-Hours; 0..23
            return jsdate.getHours();
        },
        h: function () { // 12-Hours w/leading 0; 01..12
            return _pad(f.g(), 2);
        },
        H: function () { // 24-Hours w/leading 0; 00..23
            return _pad(f.G(), 2);
        },
        i: function () { // Minutes w/leading 0; 00..59
            return _pad(jsdate.getMinutes(), 2);
        },
        s: function () { // Seconds w/leading 0; 00..59
            return _pad(jsdate.getSeconds(), 2);
        },
        u: function () { // Microseconds; 000000-999000
            return _pad(jsdate.getMilliseconds() * 1000, 6);
        },
 
        // Timezone
        e: function () { // Timezone identifier; e.g. Atlantic/Azores, ...
            // The following works, but requires inclusion of the very large
            // timezone_abbreviations_list() function.
/*              return this.date_default_timezone_get();
*/
            throw 'Not supported (see source code of date() for timezone on how to add support)';
        },
        I: function () { // DST observed?; 0 or 1
            // Compares Jan 1 minus Jan 1 UTC to Jul 1 minus Jul 1 UTC.
            // If they are not equal, then DST is observed.
            var a = new Date(f.Y(), 0),
                // Jan 1
                c = Date.UTC(f.Y(), 0),
                // Jan 1 UTC
                b = new Date(f.Y(), 6),
                // Jul 1
                d = Date.UTC(f.Y(), 6); // Jul 1 UTC
            return 0 + ((a - c) !== (b - d));
        },
        O: function () { // Difference to GMT in hour format; e.g. +0200
            var tzo = jsdate.getTimezoneOffset(),
                a = Math.abs(tzo);
            return (tzo > 0 ? "-" : "+") + _pad(Math.floor(a / 60) * 100 + a % 60, 4);
        },
        P: function () { // Difference to GMT w/colon; e.g. +02:00
            var O = f.O();
            return (O.substr(0, 3) + ":" + O.substr(3, 2));
        },
        T: function () { // Timezone abbreviation; e.g. EST, MDT, ...
            // The following works, but requires inclusion of the very
            // large timezone_abbreviations_list() function.
/*              var abbr = '', i = 0, os = 0, default = 0;
            if (!tal.length) {
                tal = that.timezone_abbreviations_list();
            }
            if (that.php_js && that.php_js.default_timezone) {
                default = that.php_js.default_timezone;
                for (abbr in tal) {
                    for (i=0; i < tal[abbr].length; i++) {
                        if (tal[abbr][i].timezone_id === default) {
                            return abbr.toUpperCase();
                        }
                    }
                }
            }
            for (abbr in tal) {
                for (i = 0; i < tal[abbr].length; i++) {
                    os = -jsdate.getTimezoneOffset() * 60;
                    if (tal[abbr][i].offset === os) {
                        return abbr.toUpperCase();
                    }
                }
            }
*/
            return 'UTC';
        },
        Z: function () { // Timezone offset in seconds (-43200...50400)
            return -jsdate.getTimezoneOffset() * 60;
        },
 
        // Full Date/Time
        c: function () { // ISO-8601 date.
            return 'Y-m-d\\Th:i:sP'.replace(formatChr, formatChrCb);
        },
        r: function () { // RFC 2822
            return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb);
        },
        U: function () { // Seconds since UNIX epoch
            return jsdate.getTime() / 1000 | 0;
        }
    };
    this.date = function (format, timestamp) {
        that = this;
        jsdate = ((typeof timestamp === 'undefined') ? new Date() : // Not provided
        (timestamp instanceof Date) ? new Date(timestamp) : // JS Date()
        new Date(timestamp * 1000) // UNIX timestamp (auto-convert to int)
        );
        return format.replace(formatChr, formatChrCb);
    };
    return this.date(format, timestamp);
}

function validaFormulario(){
	var bandera=new Array(8);
	var fecha =new Date();
	var	dia=fecha.getDate();
	var mes=fecha.getMonth()+1;
	var anio=fecha.getFullYear();
	//valida input nombre
	if(document.getElementById("name").value==''){//si esta vacio el valor
		document.getElementById("errorName").style.display ='inline';
		bandera[0]=0;
		}
	else{
		document.getElementById("errorName").style.display = "none";
		if(!/([a-zA-z])\w*/.test(document.getElementById("name").value)){//si ya escribio algo pero es un error
			document.getElementById("errorName").style.display = "inline";
			bandera[0]=0;
			}
		else
			bandera[0]=1;
	}
	//valida input imagen
	if(document.getElementById("imagenEvento").value==''){//si esta vacio el valor
		document.getElementById("errImagen").style.display = "inline";
		bandera[1]=0;
		}
	else{
		document.getElementById("errImagen").style.display = "none";
		bandera[1]=1;
		}
	var nicE = new nicEditors.findEditor('comments');
	var textoAValidar = nicE.getContent();

	if(textoAValidar==0||textoAValidar=='<br>'){
		document.getElementById("errDesc").style.display = "inline";
		bandera[2]=0;
		}
	else{//si la descripcion no esta vacia
		document.getElementById("errDesc").style.display = "none";
		bandera[2]=1;
		$('#comments').val(textoAValidar);
		}	
	if(document.getElementById("precio").value==''){
		document.getElementById("errPrecio").style.display = "inline";
		bandera[3]=0;
		}
	else{
		document.getElementById("errPrecio").style.display ="none";
		var precio=document.getElementById("precio").value;
		if(precio.charAt(0)=="0"){
			document.getElementById("errPrecio").style.display="inline";
			bandera[3]=0;
			}
		else{
			if(!/^([0-9])*[.]?[0-9]*$/.test(document.getElementById("precio").value)){
			document.getElementById("errPrecio").style.display ="inline";
			bandera[3]=0;
			}
			else
				bandera[3]=1;
		}
		}
	//validar que capacidad este seleccionada
	if((!document.getElementById("ilimitada").checked)&&(!document.getElementById("limitada").checked)){
		document.getElementById("errCap").style.display ="inline";
		bandera[4]=0;
		document.getElementById("errCap3").style.display ="none";
		}
	else{
		if(document.getElementById("ilimitada").checked){//si esta selecionado el ilimitado desabilita el input de cantidad
			document.getElementById("cap").disabled ="disable";//desbilita
			document.getElementById("cap").value ="";
			document.getElementById("errCap2").style.display ="none";//quita el cuadro de error
			bandera[4]=1;
			}
		else{//si no esta seleccionado ilimitado (esta seleccionado limitado)
			if(document.getElementById("cap").value==''){//evalua que no este vacio el input de cantidad
				document.getElementById("errCap3").style.display ="inline";//muestra errror
				bandera[5]=0;
			}
			else{//no esta vacio
				document.getElementById("errCap3").style.direction ="none";//oculta el error
				if(!/([0-9]){2,4}/.test(document.getElementById("cap").value)){//evalua que sea valida la cantidad
					document.getElementById("errCap3").style.display ="inline";
					bandera[5]=0;
					}//no es valida muestra el error
				else{//si fue valida quita el error y nos hace la bandera positiva
					document.getElementById("errCap3").style.display ="none";
					bandera[5]=1;
				}
				}//else 
			}//else principal
		document.getElementById("errCap").style.display ="none";
		document.getElementById("errCap2").style.display ="none";
		}
	//validar que seleccione una categoria
	if(document.getElementById("opcionesCat").selectedIndex==0){
		document.getElementById("errCatego").style.display ="inline";
		bandera[6]=0;
	}
	else{
		document.getElementById("errCatego").style.display ="none";
		bandera[6]=1;
	}
	//validar que la fecha del evento sea posterior a la fecha actual
	if(document.getElementById("date").value==''){//evalua que no este vacia la fecha
		document.getElementById("errFecha").style.display ="inline";
		bandera[7]=0;
		}
	else{//si no esta vacia debe evaluar que la fecha sea posterior a la actual
		document.getElementById("errFecha").style.display ="none";
		var temp=document.getElementById("date").value;
		var temp2=temp.split("/");
		if(temp2[2]==anio){//si es este año debe evaluar fechas posteriores
			if(temp2[1]==mes)//si es este mes debe evaluar que sean dias posteriores a hoy
				if(temp2[0]>dia)
					bandera[7]=1;
				else{//si no es correcto el dia
					document.getElementById("errFecha").style.display ="inline";
					bandera[7]=0;
					}	
			else{
				//si el mes es anterior es error
				if(temp[1]<mes){
					document.getElementById("errFecha").style.display ="inline";
					bandera[7]=0;
					}
				else{
					document.getElementById("errFecha").style.display ="none";
					bandera[7]=1;
					}
				}
			}//if
		else{//año es mas grande o menor
			if(temp2[2]<anio){//si el año es menor es error en fecha no evalua si mes o dia estan bien
				document.getElementById("errFecha").style.display ="inline";
				bandera[7]=0;
				}
			}
		}
		var camposCorrectos=1;
		//si todo fue correcto hará un submit
		for(var i=0; i<bandera.length;i++){
			if(bandera[i]==0){
				camposCorrectos=0;
				break;
				}
			}
		if(camposCorrectos==1)
			document.getElementById("contactForm").submit();

			
}

function validaEdicion(){
	var bandera=new Array(8);
	var fecha =new Date();
	var dia=fecha.getDate();
	var mes=fecha.getMonth()+1;
	var anio=fecha.getFullYear();

	//valida input imagen
	if(document.contactForm.imagenEvento.value==''){
		document.getElementById("errImagen").style.display="inline";
		bandera[1]=0;
		}
	else{
		document.getElementById("errImagen").style.display="none";
		bandera[1]=1;
		}
		
	//valida descripcion evento
	var nicE = new nicEditors.findEditor('descripcion');
	var textoAValidar = nicE.getContent()
	if(textoAValidar==0||textoAValidar=='<br>'){
		document.getElementById("errDesc").style.display = "inline";
		bandera[2]=0;
		}
	else{
		document.getElementById("errDesc").style.display = "none";
		bandera[2]=1;
		}	
	
	//valida precio	
	if(document.contactForm.precio.value==''){
		document.getElementById("errPrecio").style.display = "inline";
		bandera[3]=0;
		}
	else{
		document.getElementById("errPrecio").style.display ="none";
		var precio=document.contactForm.precio.value;
		if(precio.charAt(0)=="0"){
			document.getElementById("errPrecio").style.display="inline";
			bandera[3]=0;
			}
			else if(!/^([0-9])*[.]?[0-9]*$/.test(document.contactForm.precio.value)){
			document.getElementById("errPrecio").style.display ="inline";
			bandera[3]=0;
			}
		else
			bandera[3]=1;
		}
	
	//validar que capacidad este seleccionada
	if(!(document.contactForm.capacidad[0].checked)&&!(document.contactForm.capacidad[1].checked)){
		document.getElementById("errCap").style.display ="inline";
		bandera[4]=0;
		document.getElementById("errCap3").style.display ="none";
		}
	else{
		if(document.contactForm.capacidad[0].checked){//si esta selecionado el ilimitado desabilita el input de cantidad
			document.getElementById("cap").disabled ="disable";//desbilita
			document.getElementById("errCap2").style.display ="none";//quita el cuadro de error
			bandera[4]=1;
			}
		else{//si no esta seleccionado ilimitado (esta seleccionado limitado)
			if(document.contactForm.cap.value==''){//evalua que no este vacio el input de cantidad
				document.getElementById("errCap3").style.display ="inline";//muestra errror
				bandera[5]=0;
			}
			else{//no esta vacio
				document.getElementById("errCap3").style.direction ="none";//oculta el error
				if(!/([0-9]){2,4}/.test(document.contactForm.cap.value)){//evalua que sea valida la cantidad
					document.getElementById("errCap3").style.display ="inline";
					bandera[5]=0;
					}//no es valida muestra el error
				else{//si fue valida quita el error y nos hace la bandera positiva
					document.getElementById("errCap3").style.display ="none";
					bandera[5]=1;
				}
				}//else 
			}//else principal
		document.getElementById("errCap").style.display ="none";
		document.getElementById("errCap2").style.display ="none";
		}
		
	//validar que la fecha del evento sea posterior a la fecha actual
	if(document.contactForm.datepicker.value==''){//evalua que no este vacia la fecha
		document.getElementById("errFecha").style.display ="inline";
		bandera[6]=0;
		}
	else{//si no esta vacia debe evaluar que la fecha sea posterior a la actual
		document.getElementById("errFecha").style.display ="none";
		var temp=document.getElementById("datepicker").value;
		var temp2=temp.split("/");
		if(temp2[2]==anio){//si es este año debe evaluar fechas posteriores
			if(temp2[1]==mes)//si es este mes debe evaluar que sean dias posteriores a hoy
				if(temp2[0]>dia)
					bandera[6]=1;
				else{//si no es correcto el dia
					document.getElementById("errFecha").style.display ="inline";
					bandera[6]=0;
					}	
			else{
				//si el mes es anterior es error
				if(temp[1]<mes){
					document.getElementById("errFecha").style.display ="inline";
					bandera[6]=0;
					}
				else{
					document.getElementById("errFecha").style.display ="none";
					bandera[6]=1;
					}
				}
			}//if
		else{//año es mas grande o menor
			if(temp2[2]<anio){//si el año es menor es error en fecha no evalua si mes o dia estan bien
				document.getElementById("errFecha").style.display ="inline";
				bandera[6]=0;
				}
			}
		}
		var camposCorrectos=1;
		//si todo fue correcto hará un submit
		for(var i=0; i<bandera.length;i++){
			if(bandera[i]==0){
				camposCorrectos=0;
				break;
				}
			}
		if(camposCorrectos==1)
			document.getElementById("contactForm").submit();
	
			
	}