<?php
$id_usuario = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/usuarios/datos_del_usuario.php');
include('../../app/controllers/roles/listado_de_roles.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <h1>Modificar usuario: <?= $nombres ?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-success">
            <div class="card-header">
              <h2 class="card-title">Llene los datos</h2>
            </div>
            <div class="card-body" style="display: block;">
              <form action="<?= APP_URL; ?>/app/controllers/usuarios/update.php" method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Rol del usuario</label>
                      <input type="text" value="<?=$id_usuario?>" hidden name="id_usuario">
                      <div class="form-inline">
                        <select name="rol_id" id="" class="form-control">
                          <?php
                          foreach ($roles as $role) {
                            $nombre_rol_tabla = $role['nombre_rol'] ?>
                            <option value="<?= $role['id_rol']; ?>"<?php if($nombre_rol== $nombre_rol_tabla){?> selected="selected"<?php }?>><?= $role['nombre_rol']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <a href="<?= APP_URL; ?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Nombre del usuario</label>
                      <input type="text" class="form-control" name="nombres" value="<?=$nombres?>" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Correo Electronico</label>
                      <input type="email" class="form-control" name="email" value="<?=$email?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Contraseña</label>
                      <input type="password" class="form-control" name="password" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Repetir Contraseña</label>
                      <input type="password" class="form-control" name="password_repet" >
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Actualizar</button>
                      <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-secondary">Volver</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('../../admin/layout/parte2.php');
include('../../layout/mensajes.php');
?>