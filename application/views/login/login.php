<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Iniciar Sesion</title>

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/logo.jpeg')?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png')?>" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <!--external css-->
  <link href="<?= base_url('assets/lib/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style-responsive.css')?>" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?= base_url('login/verificar')?>" method="POST">
        <h2 class="form-login-heading">Ingresar Ahora</h2>
        <?php if ($this->session->userdata('msg') != NULL) { ?>
          <div class="alert alert-danger" role="alert">
          <p><?=$this->session->userdata('msg');?></p>
          </div>
        <?php } ?>
        <div class="login-wrap">
          <input type="text" class="form-control" name="username" placeholder="Usuario" autofocus>
          <br>
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <label class="checkbox">
            <a data-toggle="modal" href="login.html#myModal"> ¿Olvidaste tu contraseña?</a>
            </label>
          <button class="btn btn-theme btn-block" href="<?= base_url('documentos/mostrar')?>" type="submit"><i class="fa fa-lock"></i> ENTRAR</button>
          <hr>
          <div class="registration">
            ¿Todavía no tienes una cuenta?<br/>
            <a class="" href="<?= base_url('documentos/registrar')?>">
              Crear Cuenta
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">¿Olvidaste tu contraseña?</h4>
              </div>
              <div class="modal-body">
                <p>Ingresa tu dirección de correo para resetear tu contraseña</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                <button class="btn btn-theme" type="button">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?= base_url('assets/lib/jquery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/lib/bootstrap/js/bootstrap.min.js')?>"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?= base_url('assets/lib/jquery.backstretch.min.js')?>"></script>
  <script>
    $.backstretch("<?= base_url('assets/img/ctrldocs-bg.jpg')?>", {
      speed: 500
    });
  </script>
</body>

</html>
