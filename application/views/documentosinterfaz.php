<h1>Bienvenido a Documentos</h1>
<br><br>
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

    	</tr>


  	<?php endforeach; ?>
    

  </tbody>
</table>

