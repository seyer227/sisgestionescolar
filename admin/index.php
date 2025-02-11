<?php
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controllers/roles/listado_de_roles.php');
include('../app/controllers/usuarios/listado_de_usuarios.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <br>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <h1><?= APP_NAME ?></h1>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $contador_roles = 0;
              foreach ($roles as $rol) {
                $contador_roles++;
              }
              ?>
              <h3><?=$contador_roles?></h3>
              <p>Roles registrados</p>
            </div>
            <div class="icon">
              <i class="fas"><i class="bi bi-person-fill-gear"></i></i>
            </div>
            <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
              Más información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                foreach ($usuarios as $usuario) {
                  $contador_usuarios++;
                }
                ?>
                <h3><?=$contador_usuarios?></h3>
                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                Más Información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('../admin/layout/parte2.php');
include('../layout/mensajes.php');
?>