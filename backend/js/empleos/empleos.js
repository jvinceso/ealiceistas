$(document).ready(function(){
	$('#anc_nuevo').click(function(e){
		e.preventDefault();
		$("#c_frm_listado").fadeOut('slow');
		$("#c_frm_nuevo").fadeIn('slow');
	});
	$('#anc_listar').click(function(e){
		e.preventDefault();
		$("#c_frm_nuevo").fadeOut('slow');
		$("#c_frm_listado").fadeIn('slow');
	});
	$('#frm_empleo').validate({
	// $("#mensaje").fadeIn('slow');
	rules: {
		titulo: {required:true},
		descripcion: {required:true},
		upbase: {required:true}
	},
	submitHandler: function( form ) {
		$.ajax({
			url: 'empleos/nuevo',
			type: 'POST',
			data: {
				json:{
					titulo : $('#titulo').val(),
					descripcion : $('#descripcion').val(),
					base: $('#upbase').val()
				}
			} ,

			success: function( response ) {
				if(response!=0){
					$("#mensaje").html("datos guardados").fadeOut('slow');					
				}else{
					console.log(response);
				}
/*
		        dataTable.fnAddData([
		        	response,
		        	$( '#cName' ).val(),
		        	$( '#cEmail' ).val(),
		        	'<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Delete</a>'
		        	]);
		*/

/*		        //open Read tab
		        $( '#tabs' ).tabs( 'select', 0 );
		        
		        $( '#ajaxLoadAni' ).fadeOut( 'slow' );*/
		    }
		});
	}
});
});