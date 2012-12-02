<?php $this->load->view('layout/header');
?>
<!-- <link rel="stylesheet" href="<?php echo URL_CSS?>jquery.cleditor.css"> -->
<script type="text/javascript" src='<?php echo URL_JS; ?>grid.locale-es.js'></script>
<!-- <link rel="stylesheet" href="<?php echo URL_CSS?>style_alter.css"> -->
<style type="text/css">
.box {
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #A6A6A6;
	border-radius: 3px 3px 3px 3px;
	margin-top: 20px;
}
</style>
<script type="text/javascript" src="<?php echo URL_JS ?>bolsa/empleos.js"></script>
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
				<a id="anc_nuevo" href="#" title="Nuevo Empleo" class="tip">
					<img alt="" src="<?php echo URL_IMG?>iconos/add.png" width="26" height="26">
					<!-- Nuevo -->
				</a>
			</li>
			<li style="cursor: pointer;">
				<a id="anc_listar" href="#" title="Listar Empleos" class="tip">
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
	<div id="c_frm_listado" class="switch" >
		<form class="form-horizontal well">
			<fieldset>
				<div id="grid_empleos_ofrecidos">
					<?php $this->load->view('empleos/empleos_qry_view');?>
				</div>
			</fieldset>
		</form>
	</div>
	<!-- Formulario de Registro -->
	<div id="c_frm_nuevo" style="display:none" class="switch">
		<?php
		$atributosForm = array('id ' => 'frm_empleo',"class"=>"form-horizontal well");
		$cajatitulo    = array('name' => 'titulo', 'id' => 'titulo','required' => 'required','class'=>'span9');
		$cajaSum       = array('name' => 'sumilla', 'id' => 'sumilla','required' => 'required','class'=>'span9','rows'=>'6');
		$cajaDesc      = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required','class'=>'span9');
		$fechalim      = array('name' => 'fechalim', 'id' => 'fechalim','required' => 'required','class'=>'datepick span2');
		$uploadBases   = array('name' => 'upbase', 'id' => 'upbase','class'=>'span3 uni_style');
		echo form_open('empleos/create', $atributosForm);
		echo form_fieldset();?>
		<p class="f_legend">Registro Empleo</p>
		<div class="control-group">
			<?php echo form_label('Requerimiento','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($cajatitulo);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Fecha Limite','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_input($fechalim);?>
			</div>
		</div>
		<div class="control-group">
			<?php echo form_label('Descripción Breve','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_textarea($cajaSum);?>
				<!-- <span class="help-block">block help text</span> -->
			</div>
		</div>		
		<div class="control-group">
			<?php echo form_label('Descripción','',array("class"=>"control-label"));?>
			<div class="controls">
				<?php echo form_textarea($cajaDesc);?>
				<!-- <span class="help-block">block help text</span> -->
			</div>
		</div>
		<div id="files"></div>
		<div class="control-group">
			<?php echo form_label('Perfil','',array("class"=>"control-label"));?>
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
	<!-- Popup Edicion Registros -->
	<div id="editDialog" title="Editar Empleo" >
		<div>
			<form id="form_edit_empleo" action="" method="post" class="form-horizontal well">
				<fieldset>
					<!-- <p class="f_legend">Modificar Anuncio Empleo</p> -->
					<div class="control-group">
						<label class="control-label">Requerimiento:</label>
						<div class="controls">
							<input type="text" id="txt_upd_requerimiento" name="txt_upd_requerimiento" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" >Fecha Limite</label>
						<div class="controls">
							<input type="text" id="txt_upd_flimit" name="txt_upd_flimit" class="datepick span2" />
							<span class="help-block">&nbsp;Fecha hasta cuando estara visible</span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Descripci&oacute;n Breve :</label>
						<div class="controls">
							<textarea id="txt_upd_sumilla" name="txt_upd_sumilla" class="span4"></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Descripci&oacute;n:</label>
						<div class="controls">
							<textarea rows="7" name="txt_upd_descripcion" id="txt_upd_descripcion" class='span4'></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Perfil:</label>
						<div class="controls">
							<input type="file" class="span3 uni_style" name="txt_perfil_up" id="txt_perfil_up" size="43" />
						</div>
					</div>					
					<input type="hidden" id="txt_upd_nEmplId" name="txt_upd_nEmplId" />


				</fieldset>
			</form>
		</div>
	</div>	
	<!-- delete confirmation dialog box -->
	<div id="delConfDialog" title="Confirmar">
		<p>Estas Seguro!?</p>
	</div>	
	<!-- Dialogo para Mensajes -->
	<div id="msgDialog"><p></p></div>
</div>
<?php $this->load->view('layout/footer')?>