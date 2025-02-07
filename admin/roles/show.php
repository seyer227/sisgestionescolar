<?php

$id_rol = $_GET['id'];

include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controllers/roles/datos_del_rol.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <h1>Rol: <?=$nombre_rol?></h1>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Datos registrados</h2>
              </div>
              <div class="card-body" style="display: block;">
                 <form action="<?= APP_URL;?>/app/controllers/roles/create.php" method="POST">
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Nombre del rol</label>
                        <P> <?=$nombre_rol?></P>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Volver</a>
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
