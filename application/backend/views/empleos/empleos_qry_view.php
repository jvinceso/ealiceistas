<?php
$funciones = array(
	'Update'    => 'updateEvent()',
	'Delete'    => 'deleteEvent()'
	);				
$Tabla = array(
	'set_columns' => array(
		array('label' => 'Titulo Empleo', 'name' => 'cEOfTitulo','width' => 150),
		array('label' => 'Sumilla', 'name' => 'cEOfSumilla','width' => 200),
		array('label' => 'Descripcion Puesto', 'name' => 'cEOfDescripcion','width' => 350),
		array('label' => 'Fecha Registro', 'name' => 'dEOfFechaRegistro','width' => 105),
		array('label' => 'Fecha Limite', 'name' => 'dEOfFechaLimite','width' => 105),
		array('label' => 'Opciones', 'name' => 'opcion', 'width' => 90, 'align' => 'center')
		),
	'sort_name' =>     'dEOfFechaRegistro',
	'caption' => 'Lista de Empleos Ofrecidos',
	'div_name' => 'grid-empleos',
	'source' => 'admin.php/bolsa/empleos/get_Empleos',
	'loadOnce' => true,
	'pager' => 'pager',
	'gridComplete'=> $funciones,
	'primary_key' => 'nEOfId',
	'grid_height' => 250
	);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>	
<div class="control-group">	
	<center>
		<table id="grid-empleos"></table>
		<div id="pager"></div>
	</center>
</div>