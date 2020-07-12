<h1>Personas</h1>
<br><br>
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

    </tr>
  </thead>
  <tbody>
  
  	<?php foreach ($personas as $persona): ?>  
    	<tr>
      		<th scope="row"><?php echo $persona['id']; ?></th>
      		<td><?= $persona['cui']; ?></td>
      		<td><?= $persona['nombre']; ?></td>
      		<td><?= $persona['apellidos']; ?></td>
        	<td><?= $persona['cargo']; ?></td>
        	<td><?= $persona['correo']; ?></td>
        	<td><?= $persona['celular']; ?></td>

    	</tr>


  	<?php endforeach; ?>
    

  </tbody>
</table>
