<?php
$cajatitulo    = array('name' => 'titulo', 'id' => 'titulo','required' => 'required','class'=>'span9');
$cajaSum       = array('name' => 'sumilla', 'id' => 'sumilla','required' => 'required','class'=>'span9','rows'=>'6');
$cajaDesc      = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required','class'=>'span9');
$fechalim      = array('name' => 'fechalim', 'id' => 'fechalim','required' => 'required','class'=>'datepick span2');
$uploadBases   = array('name' => 'upbase', 'id' => 'upbase','class'=>'span3 uni_style');
?>
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