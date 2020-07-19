<h1>Bienvenido a Documentos</h1>
<p align="right">
  <a class="btn btn-primary" href="<?= base_url('documentos/crear') ?>" role="button">Ingresar Nuevo</a>
</p>
<br>
<table class="table">
<!--  <thead class="thead-dark">-->
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
      <th scope="col">Directorio</th> 
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>

      <tr>
      <form action="<?= base_url('documentos/buscar')?>" method ="POST" class="form-horizontal">
        <th> <input class="form-control" type="text" name="expediente" value="<?= ($this->session->userdata('expediente') != NULL) ? $this->session->userdata('expediente') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="nombre_doc" value="<?= ($this->session->userdata('nombre_doc') != NULL) ? $this->session->userdata('nombre_doc') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="tipo_doc" value="<?= ($this->session->userdata('tipo_doc') != NULL) ? $this->session->userdata('tipo_doc') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="persona_id" value="<?= ($this->session->userdata('persona_id') != NULL) ? $this->session->userdata('persona_id') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="fecha_entrega" value="<?= ($this->session->userdata('fecha_entrega') != NULL) ? $this->session->userdata('fecha_entrega') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="fecha_vencimiento" value="<?= ($this->session->userdata('fecha_vencimiento') != NULL) ? $this->session->userdata('fecha_vencimiento') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="usuario_id"value="<?= ($this->session->userdata('usuario_id') != NULL) ? $this->session->userdata('usuario_id') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="estado"value="<?= ($this->session->userdata('estado') != NULL) ? $this->session->userdata('estado') : ''  ?>"></th>
        <th> <input class="form-control" type="text" name="directorio"value="<?= ($this->session->userdata('directorio') != NULL) ? $this->session->userdata('directorio') : ''  ?>"></th>

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

  	<?php foreach ($documentos as $doc): ?>  
    	<tr>
      		<th scope="row"><?php echo $doc['expediente']; ?></th>
      		<td><?= $doc['nombre_doc']; ?></td>
      		<td><?= $doc['tipo_doc']; ?></td>
      		<td><?= $doc['persona_id']; ?></td>
        	<td><?= $doc['fecha_entrega']; ?></td>
        	<td><?= $doc['fecha_vencimiento']; ?></td>
        	<td><?= $doc['usuario_id']; ?></td>
        	<td><?php if ($doc['estado'] == 'archivado')
                   {
                    echo '<span class="badge badge-pill badge-success">'.'Archivado'.'</span>';
                    } else if ($doc['estado'] == 'pendiente') {
                      echo '<span class="badge badge-pill badge-info">'.'Pendiente'.'</span>';
                    }
                    else if ($doc['estado'] == 'anulado') {
                      echo '<span class="badge badge-pill badge-danger">'.'Anulado'.'</span>';
                    }
                    else
                    {
                      echo '<span class="badge badge-pill badge-warning">'.$doc['estado'].'</span>';
                    }
                      

          ?></td>
          <td><?= $doc['directorio']; ?></td>
          <td align="center">
                <a href="<?= base_url('Documentos/editar/'.$doc['expediente']); ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Editar</a>  
                <a href="<?= base_url('Documentos/eliminar/'.$doc['expediente']); ?>" class="text-danger" onClick="return confirm('¿Está seguro que desea eliminar este registro?');"><i class="fa fa-fw fa-trash"></i> Eliminar</a>
          </td>

    	</tr>


  	<?php endforeach; ?>
    

  </tbody>
</table>
<br>
<p><?= $links ?></p>
<br>

