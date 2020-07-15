<h1>Edición</h1>

<?php if (validation_errors() != NULL) {?>
<div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>

<form action="<?= base_url('documentos/actualizar/'.$documentos->expediente) ?>" method ="POST">
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="expediente">Expediente. *</label>
			<input type="text" class="form-control" id="expediente" name="expediente" placeholder="Ingrese código de expediente" value="<?= $documentos->expediente ?>">
		</div>
		<div class="col-sm-6">
			<label for="nombre_doc">Nombre del documento. *</label>
			<input type="text" class="form-control" id="nombre_doc" name="nombre_doc" placeholder="Ingrese el nombre del documento" value="<?=  $documentos->nombre_doc ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="tipo_doc">Tipo de Documento. *</label>
			<input type="text" class="form-control" id="tipo_doc" name="tipo_doc" placeholder="Ingrese el tipo de documento" value="<?= $documentos->tipo_doc  ?>">
		</div>
		<div class="col-sm-6">
			<label for="persona_id">Persona ID. *</label>
			<input type="text" class="form-control" id="persona_id" name="persona_id" placeholder="Ingrese el id de la persona(dni)" value="<?= $documentos->persona_id  ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="fecha_entrega">Fecha de entrega. *</label>
			<input type="text" class="form-control" id="fecha_entrega" name="fecha_entrega" placeholder="Ingrese la fecha de entrega" value="<?= $documentos->fecha_entrega ?>">
		</div>
		<div class="col-sm-6">
			<label for="fecha_vencimiento">Fecha de vencimiento. *</label>
			<input type="text" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Ingrese la fecha de vencimiento" value="<?= $documentos->fecha_vencimiento  ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="usuario_id">ID del Usuario. *</label>
			<input type="text" class="form-control" id="usuario_id" name="usuario_id" placeholder="Ingrese identificación del usuario" value="<?= $documentos->usuario_id ?>">
		</div>
		<div class="col-sm-6">
			<label for="estado">Estado del Documento. *</label>
			<input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese estado del documento" value="<?= $documentos->estado ?>">
		</div>

	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="directorio">Directorio. * </label>
			<input type="text" class="form-control" id="directorio" name="directorio" value="<?= set_value('directorio'); ?>" placeholder="Directorio">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>

</form>
