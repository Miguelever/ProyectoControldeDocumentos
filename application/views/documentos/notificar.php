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


<form action="<?= base_url('documentos/guardarNotificar')?>" method ="POST">
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="expediente">Expediente. *</label>
			<input type="text" class="form-control" id="expediente" name="expediente" value="<?= $documentos->expediente ?>" placeholder="Ingrese código de expediente">
		</div>
		
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="nombre_doc">Email. *</label>
			<input type="text" class="form-control" id="email" name="email" value="<?= $persona->correo ?>" placeholder="Email">
		</div>

	</div>
	<div class="form-group row">
	<div class="col-sm-6">
			<label for="persona_nombre">Nombre de Persona. *</label>
			<input type="text" class="form-control" id="persona_nombre" name="persona_nombre" value="<?= $persona->apellidos ?>" placeholder="Persona Nombre">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="asunto">Asunto. *</label>
			<input type="text" class="form-control" id="asunto" name="asunto" value="<?= set_value('asunto'); ?>" placeholder="Asunto">
		</div>
	<div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="asunto">Mensaje. *</label>
			<input type="textarea" cols= 40 rows=20 class="form-control" id="mensaje" name="mensaje" value="<?= set_value('mensaje'); ?>" placeholder="Mensaje">
		</div>
	<div>
		 
	<button type="submit" class="btn btn-primary">Guardar</button>
</form>
