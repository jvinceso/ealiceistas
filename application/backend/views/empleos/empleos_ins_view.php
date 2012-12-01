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