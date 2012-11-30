<?php $this->load->view('layout/header');
?>
<script type="text/javascript" src="<?php echo URL_JS ?>empleos/empleos.js"></script>
<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<!-- <a href="#"> -->
				<!-- <i class="splashy-configuration"></i> -->
				<span style="font-weight:bold;color:#0088CC;cursor:pointer;font-size:16px" >
					<img alt="" src="<?php echo URL_IMG?>configuration.png" width="26" height="26">
					Administraci&oacute; Liceo Trujillo
				</span>
				<!-- </a> -->
<!-- 				
					<i class="icon-home"></i>
				</a> -->
			</li>
			<li style="cursor: pointer;">
				<a id="anc_nuevo" href="#" title="Nuevo Empleo" class="ttip_t">
					<img alt="" src="<?php echo URL_IMG?>iconos/add.png" width="26" height="26">
					<!-- Nuevo -->
				</a>
			</li>
			<li style="cursor: pointer;">
				<a id="anc_listar" href="#" title="Listar Empleos" class="ttip_t">
					<!-- <i class="splashy-documents"></i> -->
					<img alt="" src="<?php echo URL_IMG?>iconos/cancel.png" width="26" height="26">
					<!-- Listar -->
				</a>
			</li>				
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div id="c_frm_listado" class="switch" >
		<form class="form-horizontal well">
			<fieldset>
				<?php
				$Tabla = array(
					'set_columns' => array(
						// array('label' => 'Nro Doc', 'name' => 'nDocId', 'width' => 75, 'hidden'=>true),
						array('label' => 'Titulo Empleo', 'name' => 'cEOfTitulo'),/*2*/
						array('label' => 'Descripcion Puesto', 'name' => 'cEOfDescripcion')
/*						array('label' => 'nEpoId', 'name' => 'nEpoId', 'hidden'=>true),
						array('label' => 'nProId', 'name' => 'nProId', 'hidden'=>true),
						array('label' => 'Expediente', 'name' => 'cExpNumAnoSigla', 'width' => 90),
						array('label' => 'Titullar', 'name' => 'titular', 'width' => 230),
						array('label' => 'Procedimiento', 'name' => 'cProNombre', 'width' => 150),
						array('label' => 'Modalidad', 'name' => 'cModNombre', 'width' => 65, 'align' => 'center'),
						array('label' => 'Etapa', 'name' => 'cEtaNombre', 'width' => 150, 'align' => 'center'),
						array('label' => 'Opciones', 'name' => 'opcion', 'width' => 50, 'align' => 'center')*/
						),
					'sort_name' =>     'nDocId',
					'caption' => 'Lista de Persona',
					'div_name' => 'grid-bandejas',
					'source' => 'sigma/bandejaPersonal/bandejaPersonalGetc/'.$BandejaTipo,
					'loadOnce' => true,
					'pager' => 'pager',
					'gridComplete'=> $funciones,
					'primary_key' => 'nEOfId',
					'grid_height' => 250
					);
echo $this->jqgrid->set_CrearGrid($Tabla);
?>				
</fieldset>
</form>
</div>
<div id="c_frm_nuevo" style="display:none" class="switch">
	<?php
	$atributosForm = array('id ' => 'frm_empleo',"class"=>"form-horizontal well");
	$cajatitulo    = array('name' => 'titulo', 'id' => 'titulo','required' => 'required','class'=>'span5');
	$cajaDesc      = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required','class'=>'span5');
	$uploadBases   = array('name' => 'upbase', 'id' => 'upbase','class'=>'span5 uni_style');
	echo form_open('empleos/create', $atributosForm);
	echo form_fieldset();?>
	<p class="f_legend">Registro Empleo</p>
	<div class="control-group">
		<?php echo form_label('Requerimiento');?>
		<div class="controls">
			<?php echo form_input($cajatitulo);?>
			<!-- <span class="help-block">block help text</span> -->
		</div>
	</div>
	<div class="control-group">
		<?php echo form_label('Descripción');?>
		<div class="controls">
			<?php echo form_textarea($cajaDesc);?>
			<!-- <span class="help-block">block help text</span> -->
		</div>
	</div>
	<div class="control-group">
		<?php echo form_label('Perfil');?>
		<div class="controls">
			<?php echo form_upload($uploadBases);?>
			<!-- <span class="help-block">block help text</span> -->
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php 
			echo form_submit('btnGuardaEmpleo', 'Guardar');
			echo form_reset('btnReset','Limpiar');
			?>
		</div>
	</div>		
	<?php
	echo form_fieldset_close(); 
	echo form_close("</div>");
	?>
</div>
</div>
<?php $this->load->view('layout/footer')?>