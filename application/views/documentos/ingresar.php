<h1>Ingresar</h1>

<?php if (validation_errors() != NULL) {?>
<div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>

	<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/fontello.css');?>">
	<!--<link rel="stylesheet" href="<?= base_url('assets/css/estilos.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/fonts/fonts.css');?>">
	<link href="<?= base_url('assets/css/dropzone.min.css');?>" rel="stylesheet" type="text/css">
	<script src="<?= base_url('assets/js/dropzone.min.js');?>" type="text/javascript"></script>-->


<form action="<?= base_url('documentos/guardar')?>" method ="POST">
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="expediente">Expediente. *</label>
			<input type="text" class="form-control" id="expediente" name="expediente" value="<?= set_value('expediente'); ?>" placeholder="Ingrese código de expediente">
		</div>
		<div class="col-sm-6">
			<label for="nombre_doc">Nombre del Documento. *</label>
			<input type="text" class="form-control" id="nombre_doc" name="nombre_doc" value="<?= set_value('nombre_doc'); ?>" placeholder="Nombre del documento">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="tipo_doc">Tipo de Documento. *</label>
			<input type="text" class="form-control" id="tipo_doc" name="tipo_doc" value="<?= set_value('tipo_doc'); ?>" placeholder="Ingrese tipo de documento">
		</div>
		<div class="col-sm-6">
			<label for="persona_id">Persona ID. *</label>
			<input type="text" class="form-control" id="persona_id" name="persona_id" value="<?= set_value('persona_id'); ?>" placeholder="Persona ID">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="fecha_entrega">Fecha de Entrega. *</label>
			<input type="text" class="form-control" id="fecha_entrega" name="fecha_entrega" value="<?= set_value('fecha_entrega'); ?>" placeholder="Fecha de Entrega del Documento">
		</div>
		<div class="col-sm-6">
			<label for="fecha_vencimiento">Fecha de Vencimiento. *</label>
			<input type="text" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="<?= set_value('fecha_vencimientocha'); ?>" placeholder="Fecha de vencimiento del Documento">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="usuario_id">Usuario ID. * </label>
			<input type="text" class="form-control" id="usuario_id" name="usuario_id" value="<?= set_value('usuario_id'); ?>" placeholder="Usuario ID">
		</div>
		<div class="col-sm-6">
			<label for="estado">Estado del Documento. *</label>
			<input type="text" class="form-control" id="estado" name="estado" value="<?= set_value('estado'); ?>" placeholder="Estado del documento">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="directorio">Directorio. * </label>
			<input type="text" class="form-control" id="directorio" name="directorio" value="<?= set_value('directorio'); ?>" placeholder="Directorio">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
</form>



























<!--</main>


		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
-->