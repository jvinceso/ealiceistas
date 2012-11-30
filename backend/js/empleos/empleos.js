/*Funciones Generales */
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
				}
			});
		}
	});
});
/*Core CRUD*/
var readUrl   = 'empleos/read',
updateUrl = 'empleos/update',
delUrl    = 'empleos/delete',
delHref   = 'empleos/delete',
updateHref='empleos/update',
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
	    // modal:true,
	    buttons: {
	    	'Update': function() {
	    		$( '#ajaxLoadAni' ).fadeIn( 'slow' );
	    		$( this ).dialog( 'close' );

	    		$.ajax({
	    			url: updateHref,
	    			type: 'POST',
	    			data: $( '#editDialog form' ).serialize(),

	    			success: function( response ) {

	    				$( '#msgDialog > p' ).html( response );
	    				$( '#msgDialog' ).dialog( 'option', 'title', 'Satisfactorio' ).dialog( 'open' );

	    				$( '#ajaxLoadAni' ).fadeOut( 'slow' );

	    				readEmpleos();

	                    //--- clear form ---
	                    $( '#editDialog form input' ).val( '' );
	                    
	                } //end success
	                
	            }); //end ajax()
	    	},

	    	'Cancel': function() {
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
/*                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                        	$( this ).remove();
                        });*/
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog


}) // End Document.Ready
function updateEvent(){
	$("#grid-empleos").delegate('span.ui-icon-pencil','click',function(){
		$( '#ajaxLoadAni' ).fadeIn( 'slow' );

		updateId = $( this ).parents( 'tr' ).attr( "id" );

		$.ajax({
			url: 'empleos/getById/'+updateId,
			dataType:'json',
			success:function(response){
				console.log(response);
				console.log(response.cEOfSumilla);
				console.log(response['cEOfSumilla']);
				$( '#txt_upd_flimit' ).val( response.dEOfFechaRegistro );
				$( '#txt_upd_requerimiento' ).val( response['cEOfTitulo'] );
				$( '#txt_upd_sumilla' ).val( response.cEOfSumilla );
				$( '#txt_upd_descripcion' ).val( response.cEOfDescripcion );

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
        // dataType: 'json',
        success: function( response ) {
        	$("#grid_empleos_ofrecidos").html(response);
/*            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].id;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
            	dataTable = $( '#records' ).dataTable({"bJQueryUI": true});*/
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers