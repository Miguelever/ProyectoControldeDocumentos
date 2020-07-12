<!DOCTYPE html>
<html lang="en"><br>

<head>
    <meta charset="UTF-8">
<!--    Para adaptar la pagina al smartphone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fonts.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Title</title>
</head>

<body>
    <div class="login-container d-flex align-items-center justify-content-center">
        <form class="login-form" action="<?= base_url('documentos') ?>" >
<!--            el mb indica margen bot-->
            <h1 class="welcome mb-5 font-weight-light text-uppercase">Bienvenido</h1>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Correo">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="forgot-link d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="recordar">
                    <label for="recordar">Recordar Contraseña</label>
                </div>
                <a href="#">Olvidaste la contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary btn-block rounded-pill">Entrar</button>
        </form>
    </div>







<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>