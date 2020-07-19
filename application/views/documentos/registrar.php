
<?php if (validation_errors() != NULL) {?>
	<div class="alert alert-danger" role="alert">
		<?php echo validation_errors(); ?>
	</div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Bootstrap Simple Registration Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #fff;
			background: #EAEAEA;
			font-family: 'Roboto', sans-serif;
		}
		.btn-success{
			background-color: #149793;
			border-color: #149793;
		}
		.form-control {
			height: 40px;
			box-shadow: none;
			color: #EAEAEA;
		}
		.form-control:focus {
			border-color: #149793;
		}
		.form-control, .btn {
			border-radius: 3px;
		}
		.signup-form {
			width: 450px;
			margin: 0 auto;
			padding: 30px 0;
			font-size: 15px;
		}
		.signup-form h2 {
			color: #636363;
			margin: 0 0 15px;
			position: relative;
			text-align: center;
		}
		.signup-form h2:before, .signup-form h2:after {
			content: "";
			height: 2px;
			width: 30%;
			background: #d4d4d4;
			position: absolute;
			top: 50%;
			z-index: 2;
		}
		.signup-form h2:before {
			left: 0;
		}
		.signup-form h2:after {
			right: 0;
		}
		.signup-form .hint-text {
			color: #999;
			margin-bottom: 30px;
			text-align: center;
		}
		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #f2f3f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.signup-form .form-group {
			margin-bottom: 20px;
		}
		.signup-form input[type="checkbox"] {
			margin-top: 3px;
		}
		.signup-form .btn {
			font-size: 16px;
			font-weight: bold;
			min-width: 140px;
			outline: none !important;
		}
		.signup-form .row div:first-child {
			padding-right: 10px;
		}
		.signup-form .row div:last-child {
			padding-left: 10px;
		}
		.signup-form a {
			color: #fff;
			text-decoration: underline;
		}
		.signup-form a:hover {
			text-decoration: none;
		}
		.signup-form form a {
			color: #149793;
			text-decoration: none;
		}
		.signup-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
<div class="signup-form">
	<form action="/examples/actions/confirmation.php" method="post">
		<h2>Registrar</h2>
		<p class="hint-text">Crear cuenta para Ciencias de la Computacion</p>
		<div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="Nombres" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Apellidos" required="required"></div>
			</div>
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Email" required="required">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
		</div>

		<div class="form-group">
			<input type="password" class="form-control" name="confirm_password" placeholder="Confirmar Contraseña" required="required">
		</div>
		<div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> Acepto <a href="#">Terminos de Uso</a> &amp; <a href="#">Politica de Privacidad</a></label>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success btn-lg btn-block">Registrarme</button>
		</div>
	</form>
	<div class="text-center"> Usted ya contiene una cuenta? <a href="#">Sign in</a></div>
</div>
</body>
</html>

















<!--

<form class="form-horizontal style-form" method="get">
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Default</label>
		<div class="col-sm-10">
			<input type="text" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Help text</label>
		<div class="col-sm-10">
			<input type="text" class="form-control">
			<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Rounder</label>
		<div class="col-sm-10">
			<input type="text" class="form-control round-form">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Input focus</label>
		<div class="col-sm-10">
			<input class="form-control" id="focusedInput" type="text" value="This is focused...">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Disabled</label>
		<div class="col-sm-10">
			<input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" placeholder="placeholder">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" placeholder="">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 col-sm-2 control-label">Static control</label>
		<div class="col-lg-10">
			<p class="form-control-static">email@example.com</p>
		</div>
	</div>
</form>
-->
