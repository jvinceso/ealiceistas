<?php
$funciones = array(
	'Update'    => 'updateProfesionalEvent()',
	'Delete'    => 'deleteProfesionalEvent()'
	);				

$Tabla = array(
	'set_columns' => array(
		array('label' => 'Nombre', 'name' => 'cProNombre','width' => 170),
		array('label' => 'Carrera', 'name' => 'cProCarrera','width' => 150),
		array('label' => 'Email', 'name' => 'cProEmail','width' => 105),
		array('label' => 'Web Site', 'name' => 'cProWeb','width' => 105),
		array('label' => 'Presentación', 'name' => 'cProDescripcion','width' => 350),
		// array('label' => 'Fecha Limite', 'name' => 'cProCurriculum','width' => 105),
		array('label' => 'Opciones', 'name' => 'opcion', 'width' => 65, 'align' => 'center')
		),
	'sort_name' =>     'nProId',
	'caption' => 'Lista de Servicios Profesionales',
	'div_name' => 'grid-profesionales',
	'source' => 'admin.php/bolsa/profesionales/get_profesionales',
	'loadOnce' => true,
	'pager' => 'pager-profesionales',
	'gridComplete'=> $funciones,
	'primary_key' => 'nEOfId',
	'grid_height' => 250
	);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>	
<div class="control-group">	
	<center>
		<table id="grid-profesionales"></table>
		<div id="pager-profesionales"></div>
	</center>
</div>