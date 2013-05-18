function ir(destino){
	if(destino!='') {
    	window.location = destino;
	}
}
function confirmar(mensaje, destino){
	var r = confirm(mensaje);
	if (r==true) {
		ir(destino);
	}
}
