<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($datos['usuarios'] as $usuario) : ?>
    <tr>
      <th scope="row"><?php echo $usuario->id_usuario; ?></th>
      <td><?php echo $usuario->nombre; ?></td>
      <td><?php echo $usuario->email; ?></td>
      <td><?php echo $usuario->telefono; ?></td>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $usuario->id_usuario; ?>">Editar</a></td>
      <td><a href="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $usuario->id_usuario; ?>">Borrar</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
