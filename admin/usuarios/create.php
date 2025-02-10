<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/roles/listado_de_roles.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <h1>Creación de un nuevo usuario</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h2 class="card-title">Llene los datos</h2>
            </div>
            <div class="card-body" style="display: block;">
              <form action="<?= APP_URL; ?>/app/controllers/usuarios/create.php" method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Rol del usuario</label>
                      <div class="form-inline">
                        <select name="rol_id" id="" class="form-control">
                          <?php
                          foreach ($roles as $role) { ?>
                            <option value="<?= $role['id_rol']; ?>"><?= $role['nombre_rol']; ?></option>
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
                      <input type="text" class="form-control" name="nombres" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Correo Electronico</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Contraseña</label>
                      <input type="password" class="form-control" name="password" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Repetir Contraseña</label>
                      <input type="password" class="form-control" name="password_repet" required>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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