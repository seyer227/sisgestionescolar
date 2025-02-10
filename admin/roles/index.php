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
              <table id="example1" class="table table-bordered table-hover table-striped table-sm">
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
                  foreach ($roles as $role) {
                    $id_rol = $role['id_rol'];
                    $contador_rol = $contador_rol + 1 ?>
                    <tr>
                      <td><?= $contador_rol; ?></td>
                      <td><?= $role['nombre_rol']; ?></td>
                      <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="show.php?id=<?= $id_rol; ?>" class="btn btn-outline-dark"><i class="bi bi-eye-fill"></i> Visualizar</a>
                          <a href="edit.php?id=<?= $id_rol; ?>" type="button" class="btn btn-outline-dark "><i class="bi bi-pencil-square"></i> Modificar</a>
                          <form action="<?= APP_URL; ?>/app/controllers/roles/delete.php" onclick="preguntar(event)" method="POST" id="miFormulario<?= $id_rol; ?>">
                            <input type="text" name="id_rol" value="<?= $id_rol; ?>" hidden>
                            <button type="submit" class="btn btn-outline-dark " style="border-radius: 0px"><i class="bi bi-trash-fill"></i> Eliminar</button>
                          </form>
                          <script>
                            function preguntar(event) {
                              event.preventDefault();
                              Swal.fire({
                                title: 'Eliminar ',
                                text: "¿Desea eliminar este rol?",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonText: 'Eliminar',
                                confirmButtonColor: '#3085d6',
                                denyButtonText: 'Cancelar',
                                denyButtonColor: '#d33',
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  var form = $('#miFormulario<?= $id_rol ?>');
                                  form.submit();
                                }
                              });
                            }
                          </script>
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

<script>
  $(function() {
    $("#example1").DataTable({
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ roles",
        "infoEmpty": "Mostrando 0 a 0 de 0 roles",
        "infoFiltered": "(filtrado de _MAX_ roles totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ roles",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros coincidentes",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": [{
          extend: 'collection',
          text: 'Reportes',
          orientation: 'landscape',
          buttons: [{
              extend: 'copy',
              text: 'Copiar'
            },
            {
              extend: 'pdf'
            },
            {
              extend: 'csv'
            },
            {
              extend: 'excel'
            },
            {
              extend: 'print',
              text: 'Imprimir'
            }
          ]
        },
        {
          extend: 'colvis',
          text: 'Visibilidad de columnas',
          collectionLayout: 'three-column',
          postfixButtons: [{
            extend: 'colvisRestore',
            text: 'Resetear filtros'
          }]
        } // ✅ Ahora está correctamente estructurado
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>