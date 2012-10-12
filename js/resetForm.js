function resetForm(){
	document.getElementById("contactForm").reset();
	document.getElementById("cap").disabled ="disable";
	document.getElementById("cap").value ="";
	document.getElementById("errCap2").style.display ="none";
	document.getElementById("errCap").style.display ="none";
	}