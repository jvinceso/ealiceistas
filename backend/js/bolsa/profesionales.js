/*Core CRUD*/
var readUrl   = 'profesionales/read',
updateUrl     = 'profesionales/update',
delUrl    	  = 'profesionales/delete',
delHref   	  = 'profesionales/delete',
updateHref	  = 'profesionales/update',
updateId;
$(document).ready(function(){
	/*Eventos del Nav*/	
	$('#anc_nuevo').click(function(e){
		e.preventDefault();


		$("#c_frm_listado_profesional").fadeOut('slow');
		// insEmpleos();
		$("#frm_profesional_new").fadeIn('slow');
	});
	$('#anc_listar').click(function(e){
		e.preventDefault();
		$("#frm_profesional_new").fadeOut('slow');
		readProfesionales();
		$("#c_frm_listado_profesional").fadeIn('slow');
	});	
	/*Set's Generales Popup*/
	$( '#msgDialog' ).dialog({
		autoOpen: false,
		modal:true,
		
		buttons: {
			'Ok': function() {
				$( this ).dialog( 'close' );
			}
		}
	});

	$('#frm_profesional').validate({
		rules: {
			txt_carrera: {required:true},
			txt_presentacion: {required:true},
			txt_email: {required:true},
			txt_nombre: {required:true},
			txt_web: {required:true}
		},
		submitHandler: function( form ) {
			// console.log($(form).serialize());
			$.ajaxFileUpload({
				url         	  :'profesionales/create', 
				secureuri      	  :false,
				fileElementId  	  :'txt_curriculum',
				dataType    	  : 'json',
				data        : {
					txt_carrera : $('#txt_carrera').val(),
					txt_presentacion : $('#txt_presentacion').val(),
					txt_email : $('#txt_email').val(),
					txt_nombre : $('#txt_nombre').val(),
					txt_web : $('#txt_web').val()
				},
				success  : function (data, status)
				{
					if(data.status != 'error')
					{
						$( '#msgDialog > p' ).html( 'Datos Registrados' );
						cleanForm('#frm_profesional');
						$( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
					}
					else{
						alert(data.msg);			      	
					}
				}
			});			
		}
	});	//End Validate

});//End Document ready
$(function(){
	$( '#editProfesionalDialog' ).dialog({
		autoOpen: false,
		modal:true,
		buttons: {
			'Actualizar': function() {
				$( '#ajaxLoadAni' ).fadeIn( 'slow' );
				$( this ).dialog( 'close' );
				$.ajaxFileUpload({
					url         	  :updateHref, 
					secureuri      :false,
					fileElementId  :'txt_upd_curriculum',
					dataType    	  : 'json',
					data        :{
						txt_upd_nombre : $( '#txt_upd_nombre' ).val(),
						// $( '#txt_upd_curriculum' ).val( response.cProCurriculum ),
						txt_upd_carrera : $( '#txt_upd_carrera' ).val(),
						txt_upd_email : $( '#txt_upd_email' ).val(),
						txt_upd_web : $( '#txt_upd_web' ).val(),
						txt_upd_presentacion : $( '#txt_upd_presentacion' ).val(),
						txt_upd_nProId :$( '#txt_upd_nProId' ).val()
					},
					success  : function (data, status)
					{
						if(data.status != 'error')
						{
							$( '#ajaxLoadAni' ).fadeOut( 'slow' );			
							cleanForm('#form_edit_profesional');
							readProfesionales();
							$( '#msgDialog > p' ).html( 'Datos Actualizados' );
							$( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
						}else{
							alert(data.msg);
						}
						$( '#ajaxLoadAni' ).fadeOut( 'slow' );
	    		   }//End Success

	    		});//End AjaxFileUpoad	    		
			},
			'Cancelar': function() {
				$( this ).dialog( 'close' );
			}
			},
			width: '650px'
	}); //end Edit dialog

	$( '#delProfesionalConfDialog' ).dialog({
		autoOpen: false,

		buttons: {
			'No': function() {
				$( this ).dialog( 'close' );
			},

			'Si': function() {
	                //display ajax loader animation here...
	                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
	                
	                $( this ).dialog( 'close' );
	                
	                $.ajax({
	                	url: delHref+"/"+updateId,

	                	success: function( response ) {
	                        //hide ajax loader animation here...
	                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
	                        // get_page();
	                        $( '#msgDialog > p' ).html( response );
	                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
	                        readProfesionales();
	                        
	                    } //end success
	                });
	        } //end Yes        
	    } //end buttons
	}); //end dialog Delete

});
function updateProfesionalEvent(){
	$("#grid_profesional_ofrecidos").delegate('span.ui-icon-pencil','click',function(){
		$( '#ajaxLoadAni' ).fadeIn( 'slow' );
		cleanForm('#frm_profesional');
		updateId = $( this ).parents( 'tr' ).attr( "id" );
		$.ajax({
			url: 'profesionales/getById/'+updateId,
			dataType:'json',
			success:function(response){
				$( '#txt_upd_nombre' ).val( response.cProNombre );
				// $( '#txt_upd_curriculum' ).val( response.cProCurriculum );
				$( '#txt_upd_carrera' ).val( response.cProCarrera );
				$( '#txt_upd_email' ).val( response.cProEmail );
				$( '#txt_upd_web' ).val( response.cProWeb );
				$( '#txt_upd_presentacion' ).val( response.cProDescripcion );
				$( '#ajaxLoadAni' ).fadeOut( 'slow' );			

				$( '#txt_upd_nProId' ).val( response.nProId );//--- asignamos id al campo oculto 

				$( '#editProfesionalDialog' ).dialog( 'open' );
			}
		});
	});//end update delegate
}
function deleteProfesionalEvent(){
	// alert("ghola");
	$( '#grid_profesional_ofrecidos' ).delegate( 'span.ui-icon-circle-close', 'click', function() {
		// alert("Hola");
		updateId = $( this ).parents( 'tr' ).attr( "id" );
		// delProfesionalConfDialog
		$( '#delProfesionalConfDialog' ).dialog( 'open' );
		return false;
	}); //end delete delegate	
}
function readProfesionales(){
	//display ajax loader animation
	$( '#ajaxLoadAni' ).fadeIn( 'slow' );
	
	$.ajax({
		url: readUrl,
		type:'GET',
	    // dataType: 'json',
	    success: function( response ) {
	    	$("#grid_profesional_ofrecidos").html(response);           
	        //hide ajax loader animation here...
	        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
	    }
	});	
}//End readProfesionales