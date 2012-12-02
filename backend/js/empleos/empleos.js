/*Funciones Generales*/
$(document).ready(function(){
	$('#anc_nuevo').click(function(e){
		e.preventDefault();
		$("#c_frm_listado").fadeOut('slow');
		// insEmpleos();
		$("#c_frm_nuevo").fadeIn('slow');
	});
	$('#anc_listar').click(function(e){
		e.preventDefault();
		$("#c_frm_nuevo").fadeOut('slow');
		readEmpleos();
		$("#c_frm_listado").fadeIn('slow');
	});

	$('#frm_empleo').validate({
		rules: {
			titulo: {required:true},
			descripcion: {required:true},
			upbase: {required:true}
		},
		submitHandler: function( form ) {
			// console.log($(form).serialize());
			$.ajaxFileUpload({
				url         	  :'empleos/create', 
				secureuri      :false,
				fileElementId  :'upbase',
				dataType    	  : 'json',
				data        : {
					'titulo'       : $('#titulo').val(),
					'sumilla'		 : $('#sumilla').val(),
					'descripcion'  : $('#descripcion').val(),
					'fechalim'	 : $('#fechalim').val()
				},
				success  : function (data, status)
				{
					if(data.status != 'error')
					{
						$( '#msgDialog > p' ).html( 'Datos Registrados' );
						cleanForm('#frm_empleo');
						$( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
			     }else{
			     	alert(data.msg);			      	
			     }
			 }
			});			
		}
	});
});
/*Core CRUD*/
var readUrl   = 'empleos/read',
updateUrl     = 'empleos/update',
delUrl    	  = 'empleos/delete',
delHref   	  = 'empleos/delete',
updateHref	  ='empleos/update',
updateId;

$(function(){
	$( '#msgDialog' ).dialog({
		autoOpen: false,

		buttons: {
			'Ok': function() {
				$( this ).dialog( 'close' );
			}
		}
	});	

	$( '#editDialog' ).dialog({
		autoOpen: false,
		modal:true,
		buttons: {
			'Actualizar': function() {
				$( '#ajaxLoadAni' ).fadeIn( 'slow' );
				$( this ).dialog( 'close' );
				$.ajaxFileUpload({
					url         	  :updateHref, 
					secureuri      :false,
					fileElementId  :'txt_perfil_up',
					dataType    	  : 'json',
					data        :{
						txt_upd_requerimiento : $('#txt_upd_requerimiento').val(),
						txt_upd_flimit : $('#txt_upd_flimit').val(),
						txt_upd_sumilla : $('#txt_upd_sumilla').val(),
						txt_upd_descripcion : $('#txt_upd_descripcion').val(),
						txt_perfil_up : $('#txt_perfil_up').val(),
						txt_upd_nEmplId : $('#txt_upd_nEmplId').val()
					},
					success  : function (data, status)
					{
						if(data.status != 'error')
						{
							cleanForm('#form_edit_empleo');
							readEmpleos();
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

$( '#delConfDialog' ).dialog({
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
                	url: delHref+"",

                	success: function( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        // get_page();
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        readEmpleos();
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog


}) // End Document.Ready
function updateEvent(){
	$("#grid-empleos").delegate('span.ui-icon-pencil','click',function(){
		$( '#ajaxLoadAni' ).fadeIn( 'slow' );
		cleanForm('#frm_empleo');
		updateId = $( this ).parents( 'tr' ).attr( "id" );
		$.ajax({
			url: 'empleos/getById/'+updateId,
			dataType:'json',
			success:function(response){
				console.log(response);
				console.log(response.cEOfSumilla);
				console.log(response['cEOfSumilla']);
				$( '#txt_upd_flimit' ).val( response.dEOfFechaLimite );
				$( '#txt_upd_requerimiento' ).val( response['cEOfTitulo'] );
				$( '#txt_upd_sumilla' ).val( response.cEOfSumilla );
				$( '#txt_upd_descripcion' ).val( response.cEOfDescripcion );
				// refresh_files();
				$( '#ajaxLoadAni' ).fadeOut( 'slow' );
				
				//--- asignamos id al campo oculto ---
				$( '#txt_upd_nEmplId' ).val( response.nEOfId );

				$( '#editDialog' ).dialog( 'open' );
			}
		});
	});//end update delegate
}
function deleteEvent(){
	$( '#grid-empleos' ).delegate( 'span.ui-icon-circle-close', 'click', function() {
		updateId = $( this ).parents( 'tr' ).attr( "id" );
		delHref=delHref+"/"+updateId;

		$( '#delConfDialog' ).dialog( 'open' );

		return false;

	}); //end delete delegate	
}
function readEmpleos() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
    	url: readUrl,
    	type:'GET',
        // dataType: 'json',
        success: function( response ) {
        	$("#grid_empleos_ofrecidos").html(response);           
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers