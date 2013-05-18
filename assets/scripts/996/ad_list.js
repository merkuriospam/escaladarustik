function grabar_orden(nuevo_orden){
	if(nuevo_orden != '') {
		$('#myoverlay').fadeIn();
		$.ajax({
			type: "POST",
			url: SITE_URL+"admin/entradas/grabar_orden",
			data: {categoria_id: CATEGORIA_ID, orden: nuevo_orden}
		}).done(function (response, textStatus, jqXHR) {
			console.log(response);
			$('#myoverlay').fadeOut();
		}).fail(function (jqXHR, textStatus, errorThrown){
			$('#txtmyoverlay').html("ERROR: "+textStatus, errorThrown);
	        console.error("ERROR: "+textStatus, errorThrown);
	    }).always(function () {
        	// rehabilitar
    	});
	}
}
$(document).ready(function() {
    $("#tbl_listado_admin").tableDnD({
    	onDragClass: "trDnD",
		onDrop: function(table, row) {
			var rows = table.tBodies[0].rows;
            var debugStr = "";
            for (var i=0; i<rows.length; i++) {
                debugStr += rows[i].id+",";
            }
            debugStr = debugStr.substr(0,(debugStr.length-1));
            grabar_orden(debugStr);
        }    	
    });
});