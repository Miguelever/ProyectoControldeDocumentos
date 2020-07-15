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
