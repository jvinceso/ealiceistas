<?php
$this->load->view('layout/header');
/*
cProCarrera
cProCurriculum
cProDescripcion
cProEmail
cProNombre
cProWeb
nProEstado
nProId
*/
?>
<script type="text/javascript" src='<?php echo URL_JS; ?>grid.locale-es.js'></script>
<script type="text/javascript" src="<?php echo URL_JS ?>bolsa/profesionales.js"></script>
<script type="text/javascript" src='<?php echo URL_JS; ?>ajaxfileupload.js'></script>
<center>
	<div id="ajaxLoadAni">
		<img src="<?php echo URL_IMG?>ajax_loader.gif" alt="Ajax Cargando Animacion" />
		<span>Cargando...</span>
	</div>
</center>
<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<span style="font-weight:bold;color:#0088CC;cursor:pointer;font-size:16px" >
					<img alt="" src="<?php echo URL_IMG?>configuration.png" width="26" height="26">
					Administraci&oacute;n Liceo Trujillo
				</span>
			</li>
			<li style="cursor: pointer;">
				<a id="anc_nuevo" href="#" title="Nuevo Profesional" class="tip">
					<img alt="" src="<?php echo URL_IMG?>iconos/add.png" width="26" height="26">
					<!-- Nuevo -->
				</a>
			</li>
			<li style="cursor: pointer;">
				<a id="anc_listar" href="#" title="Listar Profesionales" class="tip">
					<!-- <i class="splashy-documents"></i> -->
					<img alt="" src="<?php echo URL_IMG?>iconos/cancel.png" width="26" height="26">
					<!-- Listar -->
				</a>
			</li>				
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<!-- Lista Registros de BD -->
	<div id="c_frm_listado_profesional" class="switch" >
		<form class="form-horizontal well">
			<fieldset>
				<div id="grid_profesional_ofrecidos">
					<?php $this->load->view('empleos/profesionales_qry_view');?>
				</div>
			</fieldset>
		</form>
	</div>
	<div id="frm_profesional_new" class="switch" style="display:none" >
		<?php
		$atributosForm    = array('id ' => 'frm_profesional',"class"=>"form-horizontal well");
		$txt_carrera      = array('name' => 'txt_carrera', 'id' => 'txt_carrera','required' => 'required','class'=>'span5');
		$txt_curriculum   = array('name' => 'txt_curriculum', 'id' => 'txt_curriculum','required' => 'required','class'=>'span4');
		$txt_presentacion = array('name' => 'txt_presentacion', 'id' => 'txt_presentacion','required' => 'required','class'=>'span6','rows'=>'6');
		$txt_email        = array('name' => 'txt_email', 'id' => 'txt_email','required' => 'required','class'=>'span4','placeholder'=>'alguien@ejemplo.com');
		$txt_nombre       = array('name' => 'txt_nombre', 'id' => 'txt_nombre','class'=>'span5','required' => 'required');
		$txt_web          = array('name' => 'txt_web', 'id' => 'txt_web','class'=>'span4','required' => 'required','placeholder'=>'http://www.misitioweb.com');
		echo form_open('profesional/create', $atributosForm);
		echo form_fieldset();?>	
		<p class="f_legend">Registro Profesional</p>
		<div class="control-group">
			<?php echo form_label('Nombres ','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($txt_nombre);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Carrera ','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($txt_carrera);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Email ','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($txt_email);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Sitio Web ','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($txt_web);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Reseña ','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_textarea($txt_presentacion);?>
				<span class="help-block">Breve descripción profesional</span>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Curriculum Vitae','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_upload($txt_curriculum);?>
				<span class="help-block">Adjuntar currriculum Vitae en formato pdf</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php 
				echo form_submit('btnGuardaProfesional', 'Guardar');
				echo form_reset('btnResetProfesional','Limpiar');
				?>
			</div>
		</div>	
		<?php
		echo form_fieldset_close(); 
		echo form_close("</div>");
		?>
	</div>
	<!-- Popup Edicion Registros -->
	<div id="editProfesionalDialog" title="Editar Profesional" >
		<div>
			<form id="form_edit_profesional" action="" method="post" class="form-horizontal well">
				<fieldset>
					<!-- <p class="f_legend">Modificar Anuncio Empleo</p> -->
					<div class="control-group">				
						<label class="control-label">Nombre:</label>
						<div class="controls">
							<input type="text" id="txt_upd_nombre" name="txt_upd_nombre" class="span4"  />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" >Carrera</label>
						<div class="controls">
							<input type="text" id="txt_upd_carrera" name="txt_upd_carrera" class="span4" />
							<!-- <span class="help-block">&nbsp;Fecha hasta cuando estara visible</span> -->
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" >E-mail</label>
						<div class="controls">
							<input type="text" id="txt_upd_email" placeholder="alguien@ejemplo.com" name="txt_upd_email" class="span4" />
							<!-- <span class="help-block">&nbsp;Fecha hasta cuando estara visible</span> -->
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" >E-mail</label>
						<div class="controls">
							<input type="text" id="txt_upd_web" placeholder="alguien@ejemplo.com" name="txt_upd_web" class="span4" />
							<!-- <span class="help-block">&nbsp;Fecha hasta cuando estara visible</span> -->
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Presentaci&oacute;n :</label>
						<div class="controls">
							<textarea id="txt_upd_presentacion" name="txt_upd_presentacion" class="span4" rows="8"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hoja de Vida:</label>
						<div class="controls">
							<input type="file" class="span4 uni_style" name="txt_upd_curriculum" id="txt_upd_curriculum" size="43" />
							<span class="help-block">&nbsp;Adjuntar currriculum Vitae en formato pdf</span>
						</div>
					</div>					
					<input type="hidden" id="txt_upd_nProId" name="txt_upd_nProId" />
				</fieldset>
			</form>
		</div>
	</div>

	<div id="delProfesionalConfDialog" title="Confirmar">
		<p>Estas Seguro!?</p>
	</div>	
	<!-- Dialogo para Mensajes -->
	<div id="msgDialog"><p></p></div>	
	<?php
	$this->load->view('layout/footer');
	?>