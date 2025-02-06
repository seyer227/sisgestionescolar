<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');

include ('../../app/controllers/roles/listado_de_roles.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <h1>Listado de Roles</h1>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title">Roles registrados</h2>

                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear Rol</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <TABle class="table table-bordered table-hover table-striped table-sm">
              <thead class="thead-dark">
                <TR>
                  <TH>#</TH>
                  <TH>Nombre del rol</TH>
                  <TH style="width: 600px; text-align: center;">Acciones</TH>
                </TR>
              </thead>
              <tbody>
              <?php 
              $contador_rol = 0;
              foreach ($roles as $role){
                $id_rol = $role['id_rol'];
                $contador_rol=$contador_rol + 1?>
                <tr>
                  <td><?=$contador_rol;?></td>
                  <td><?=$role['nombre_rol'];?></td>
                  <td style="text-align: center;"> 
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-outline-dark "><i class="bi bi-eye-fill"></i> Visualizar</button>
                      <button type="button" class="btn btn-outline-dark "><i class="bi bi-pencil-square"></i> Modificar</button>
                      <button type="button" class="btn btn-outline-dark "><i class="bi bi-trash-fill"></i> Eliminar</button>
                    </div>
                  </td>
                </tr>
              <?php
                } 
              ?>                
              </tbody>
            </TABle>
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