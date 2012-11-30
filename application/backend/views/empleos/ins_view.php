<?php
$this->load->view('layout/header');
?>
<script type="text/javascript" src="<?php echo URL_JS ?>empleos/empleos.js"></script>
<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#"><i class="icon-home"></i></a></li>
			<li><a href="#">Sports & Toys</a></li>
			<li><a href="#">Toys & Hobbies</a></li>
			<li><a href="#">Learning & Educational</a></li>
			<li><a href="#">Astronomy & Telescopes</a></li>
			<li>Telescope 3735SX</li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
		<?php
		$atributosForm = array('id ' => 'frm_empleo');
		$cajatitulo    = array('name' => 'titulo', 'id' => 'titulo','required' => 'required','class'=>'span5');
		$cajaDesc      = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required','class'=>'span5');
	// $cajaDesc      = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required','class'=>'span8');
		$uploadBases   = array('name' => 'upbase', 'id' => 'upbase','class'=>'span5 uni_style');
	// $cajaDesc = array('name' => 'descripcion', 'id' => 'descripcion','required' => 'required');
		echo form_fieldset('Registro Empleo');
	// echo "<p>Ingrese Los Datos requeridos</p>\n";
		echo form_open('empleos/create', $atributosForm);
		?><fieldset><?php
		echo "<div class='uni-selector'>";
		echo form_label('Requerimiento', 'titulo');
		echo form_input($cajatitulo);
		echo form_label('Descripción', 'descripcion');
		echo form_textarea($cajaDesc);
		echo form_label('Bases Participación', 'upbase');
		echo form_upload($uploadBases);
		echo "<br><center>";
		echo form_submit('btnGuardaEmpleo', 'Guardar');
		echo form_reset('btnReset','Limpiar');
		echo "</center>";
	?></fieldset><?php
		echo form_close("</div>");
		echo form_fieldset_close(); 	
		$this->load->view('layout/footer');
		?>
</div>

<!-- <div class="span6">
	<label>Textarea with <code>.span8</code> class</label>
	<textarea class="span8" rows="3" cols="10" id="txtarea_sp" name="txtarea_sp"></textarea>
</div> -->