<?php
 
if ((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono']))) {
     $mensaje = $_SESSION['mensaje'];
     $icono = $_SESSION['icono'];
     ?>
     <script>
         Swal.fire({
             position: "top-end",
             icon: '<?= $icono ?>',
             title: '<?= $mensaje ?>',
             shoConfirmButton: false,
             timer: 4000
         });
     </script>
<?php
        unset($_SESSION['mensaje']);
        unset($_SESSION['icono']);
}
?>
