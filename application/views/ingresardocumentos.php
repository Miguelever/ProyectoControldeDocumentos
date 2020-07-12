<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Red Social</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="fonts/fonts.css">
	<link href="/css/dropzone.min.css" rel="stylesheet" type="text/css">
	<script src="js/dropzone.min.js" type="text/javascript"></script>
</head>


<body>

	<header>
		
	</header>

		<main class="container">
-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/fontello.css');?>">
	<!--<link rel="stylesheet" href="<?= base_url('assets/css/estilos.css');?>">-->
	<link rel="stylesheet" href="<?= base_url('assets/fonts/fonts.css');?>">
	<link href="<?= base_url('assets/css/dropzone.min.css');?>" rel="stylesheet" type="text/css">
	<script src="<?= base_url('assets/js/dropzone.min.js');?>" type="text/javascript"></script>

			<div class="container">
			<div class="row justify-content-center">Ingresar Documento</div>
			</div> <br> <br>
			<div class="row">
				<div class="col col-8">
					<form action="#">
						<div class="form-group row">
							<div class="col-sm-6">
								<label for="nombreDoc">Nombre del Documento</label>
								<input type="text" class="form-control" id="nombreDoc" placeholder="Ingrese Nombre">
							</div>
							<div class="col-sm-6">
								<label for="nExpediente">Numero de Expediente</label>
								<input type="text" class="form-control" id="nExpediente" placeholder="Last name">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label for="tipoDoc">Tipo del Documento</label>
								<input type="text" class="form-control" id="tipoDoc" placeholder="Ingrese Nombre">
							</div>
							<div class="col-sm-6">
								<label for="docEmisor">Documento del Emisor</label>
								<input type="text" class="form-control" id="docEmisor" placeholder="Last name">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label for="estadoDoc">Estado del Documento</label>
								<input type="text" class="form-control" id="estadoDoc" placeholder="Estado">
							</div>
							<div class="col-sm-6">
								<label for="Estado">Estado</label>
								<input type="text" class="form-control" id="Estado" placeholder="Estado del Documento">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6">
								<label for="fechaCreacion">Fecha de Creacion</label>
								<input type="text" class="form-control" id="fechaCreacion" placeholder="Marque fecha de creacion">
							</div>
							<div class="col-sm-6">
								<label for="fechaVence">Fecha de Vencimiento</label>
								<input type="text" class="form-control" id="fechaVence" placeholder="Last name">
							</div>
						</div>

						<button type="submit" class="btn btn-primary">Enviar</button>

						<button type="submit" class="btn btn-primary">Cancelar</button>
					</form>

				</div>

				<div class="col col-4 ">
					<div id="uploads"></div>
					<div class="dropzone" id="dropzone">Drop files here</div>

				</div>

			</div>


























<!--</main>


		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
-->