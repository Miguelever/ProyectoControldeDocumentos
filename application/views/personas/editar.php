<h1>Edición</h1>

<?php if (validation_errors() != NULL) {?>
<div class="alert alert-danger" role="alert">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>


<form action="<?= base_url('personas/actualizar/'.$persona->id) ?>" method ="POST">
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="dni">DNI</label>
			<input type="text" class="form-control" id="id" name="id" placeholder="Ingrese DNI" value="<?= $persona->id ?>">
		</div>
		<div class="col-sm-6">
			<label for="cui">CUI</label>
			<input type="text" class="form-control" id="cui" name="cui" placeholder="Ingrese CUI" value="<?=  $persona->cui ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="nombre">Nombres</label>
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombres" value="<?= $persona->nombre  ?>">
		</div>
		<div class="col-sm-6">
			<label for="apellidos">Apellidos</label>
			<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" value="<?= $persona->apellidos  ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="cargo">Cargo</label>
			<input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ingrese cargo" value="<?= $persona->cargo ?>">
		</div>
		<div class="col-sm-6">
			<label for="correo">Correo</label>
			<input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese correo" value="<?= $persona->correo  ?>">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6">
			<label for="celular">Celular</label>
			<input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese celular" value="<?= $persona->celular ?>">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>

</form>


<!--   <form action="<?= base_url('cities/update/'.$city->id) ?>" method="POST">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" value="<?=$city->name?>" placeholder="Type the contact name">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-success">Update City</button>
            </div>
        </div>
    </form>



<?= $persona->id;  ?> -->