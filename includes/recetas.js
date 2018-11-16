
function cargareceta(urlset) { 
if(window.document.all.btnenviorecetas.value == "Comparti tus secretos en la cocina"){
		
		GuardoReceta = window.document.all.txtreceta.value;
		window.document.all.txtreceta.value = "Escriba aqui su receta"
		window.document.all.btnenviorecetas.value = "Cancelar"
		window.document.all.txtreceta.readOnly = false;
		window.document.all.txtreceta.focus();
		window.document.all.txtreceta.select();
		window.document.all.btnenviorecetas.value = "Enviar receta";
		window.document.all.btncancelareceta.style.visibility = 'visible';		
		window.document.all.txtrecetatitulo.style.visibility = 'visible';
		window.document.all.recetatitulo.style.visibility = 'visible';
		window.document.all.recetadatos.style.visibility = 'visible';
		
		}
		
else
{
		 
	 
		getPag(urlset+'misc/rec_add.php','contenidorecetas','contenidorecetas','Procesando Informacion','');
		//window.alert("Gracias por enviar su receta a Comermas!")
		window.document.all.btnenviorecetas.value = "Comparti tus secretos en la cocina"
		window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
		window.document.all.txtreceta.value = GuardoReceta;
}
}

function canceloreceta() {
window.document.all.txtreceta.value = GuardoReceta;
window.document.all.btnenviorecetas.value = "Comparti tus secretos en la cocina"
window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
}


function refreshreceta()
{
window.document.all.btncancelareceta.style.visibility = 'hidden';
		window.document.all.txtrecetatitulo.style.visibility = 'hidden';
		window.document.all.recetatitulo.style.visibility = 'hidden';
		window.document.all.recetadatos.style.visibility = 'hidden';
		window.document.all.txtreceta.readOnly = true;
}