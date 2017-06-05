function mostrar(){
	$.ajax({
		type: "POST",
		url: "./php/resultado.php",
		data:'busqueda='+$("#busqueda").val(),
		success: function(data){
			$("#resultado").show();
			$("#resultado").html(data);
		}
	});
}

$("#busqueda").bind("enterKey",mostrar());
