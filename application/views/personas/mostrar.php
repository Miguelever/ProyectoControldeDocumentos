<h1>Personas</h1>
<p align="right">
  <a class="btn btn-primary" href="<?= base_url('personas/crear') ?>" role="button">Ingresar Nuevo</a>
</p>
<br>
<table class="table">

  <thead class="thead-dark">
    
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">CUI</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Cargo</th>
      <th scope="col">Correo</th>
      <th scope="col">Celular</th>
      <th scope="col" class="text-center">Acciones</th>

    </tr>
  </thead>
  <tbody>
      <tr>
      <form action="<?= base_url('personas/buscar')?>" method ="POST" class="form-horizontal">
        <th> <input class="form-control" type="text" name="dni" value="<?= ($this->session->userdata('dni') != NULL) ? $this->session->userdata('dni') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="cui" value="<?= ($this->session->userdata('cui') != NULL) ? $this->session->userdata('cui') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="nombre" value="<?= ($this->session->userdata('nombre') != NULL) ? $this->session->userdata('nombre') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="apellidos" value="<?= ($this->session->userdata('apellidos') != NULL) ? $this->session->userdata('apellidos') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="cargo" value="<?= ($this->session->userdata('cargo') != NULL) ? $this->session->userdata('cargo') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="correo" value="<?= ($this->session->userdata('correo') != NULL) ? $this->session->userdata('correo') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="celular"value="<?= ($this->session->userdata('celular') != NULL) ? $this->session->userdata('celular') : ''  ?>"></th>
        <th> 
          <div class="row">
              <div class="col-md-5 col-xs-5">
                 <button type="submit" class="btn btn-primary" name="action" value="Buscar"><i class="fa fa-fw fa-search"></i></button>
              </div> <!-- col-6 closed -->
              <div class="col-md-5 col-xs-5 pull-right">
                  <button type="submit" class="btn btn-primary" name="action" value="Recargar"><i class="fa fa-fw fa-refresh"></i></button>
              </div> <!-- col-6 closed -->
          </div> <!-- row ends -->
        </th>
        </form>
       </tr>
  	<?php foreach ($personas as $persona): ?>  
    	<tr>
      		<th scope="row"><?php echo $persona['dni']; ?></th>
      		<td><?= $persona['cui']; ?></td>
      		<td><?= $persona['nombre']; ?></td>
      		<td><?= $persona['apellidos']; ?></td>
        	<td><?= $persona['cargo']; ?></td>
        	<td><?= $persona['correo']; ?></td>
        	<td><?= $persona['celular']; ?></td>
          <td align="center">
                <a href="<?= base_url('Personas/editar/'.$persona['id']); ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a> | 
                <a href="<?= base_url('Personas/eliminar/'.$persona['id']); ?>" class="text-danger" onClick="return confirm('¿Está seguro que desea eliminar este registro?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
          </td>

    	</tr>


  	<?php endforeach; ?>
    

  </tbody>
</table>
<br>
<p><?= $links ?></p>
<br>
