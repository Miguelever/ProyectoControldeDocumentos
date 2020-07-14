<h1>Ingresar</h1>

<?php if (validation_errors() != NULL) {?>
<div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>


<form action="<?= base_url('personas/guardar')?>" method ="POST">
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="dni">DNI. *</label>
			<input type="text" class="form-control" id="id" name="id" maxlength="8" value="<?= set_value('id'); ?>" placeholder="Ingrese DNI">
		</div>
		<div class="col-sm-6">
			<label for="cui">CUI.</label>
			<input type="text" class="form-control" id="cui" name="cui" maxlength="8" value="<?= set_value('cui'); ?>" placeholder="Ingrese CUI (Opcional)">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="nombre">Nombres. *</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre'); ?>" placeholder="Ingrese nombres">
		</div>
		<div class="col-sm-6">
			<label for="apellidos">Apellidos. *</label>
			<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= set_value('apellidos'); ?>" placeholder="Ingrese apellidos" >
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="cargo">Cargo. *</label>
			<input type="text" class="form-control" id="cargo" name="cargo" value="<?= set_value('cargo'); ?>" placeholder="Ingrese cargo">
		</div>
		<div class="col-sm-6">
			<label for="correo">Correo. *</label>
			<input type="text" class="form-control" id="correo" name="correo" value="<?= set_value('correo'); ?>"  placeholder="Ingrese correo">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="celular">Celular</label>
			<input type="text" class="form-control" id="celular" name="celular" value="<?= set_value('celular'); ?>" placeholder="Ingrese celular (opcional)">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>

</form>


