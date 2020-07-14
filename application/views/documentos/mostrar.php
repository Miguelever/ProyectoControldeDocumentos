<h1>Bienvenido a Documentos</h1>
<p align="right">
  <a class="btn btn-primary" href="<?= base_url('documentos/crear') ?>" role="button">Ingresar Nuevo</a>
</p>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Expediente</th>
      <th scope="col">Nombre del Documento</th>
      <th scope="col">Tipo de Documento</th>
      <th scope="col">Persona ID</th>
      <th scope="col">Fecha de Entrega</th>
      <th scope="col">Fecha de Vencimiento</th>
      <th scope="col">Usuario ID</th>
      <th scope="col">Estado</th>
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
  
  	<?php foreach ($documentos as $doc): ?>  
    	<tr>
      		<th scope="row"><?php echo $doc['expediente']; ?></th>
      		<td><?= $doc['nombre_doc']; ?></td>
      		<td><?= $doc['tipo_doc']; ?></td>
      		<td><?= $doc['persona_id']; ?></td>
        	<td><?= $doc['fecha_entrega']; ?></td>
        	<td><?= $doc['fecha_vencimiento']; ?></td>
        	<td><?= $doc['usuario_id']; ?></td>
        	<td><?= $doc['estado']; ?></td>
          <td align="center">
                <a href="<?= base_url('Documentos/editar/'.$doc['expediente']); ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a>  
                <a href="<?= base_url('Documentos/eliminar/'.$doc['expediente']); ?>" class="text-danger" onClick="return confirm('¿Está seguro que desea eliminar este registro?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
          </td>

    	</tr>


  	<?php endforeach; ?>
    

  </tbody>
</table>

