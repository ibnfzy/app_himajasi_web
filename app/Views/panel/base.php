<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HIMAJASI Panel Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/panel_assets/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/panel_assets/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/panel_assets/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="/panel_assets/assets/images/favicon.ico" />

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.2.1/css/froala_editor.pkgd.css'
    integrity='sha512-BL1I5nNXj1uRLB/jVCWUyeNwnCTd/L4OjSneVBHS6PnhGFKxCFlyYAkCAXFFckY1Utxti/ZuGikoCcGBWyi7Vw=='
    crossorigin='anonymous' />

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
    integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=='
    crossorigin='anonymous' />

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css'
    integrity='sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=='
    crossorigin='anonymous' />

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?= $this->include('panel/layouts/navbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?= $this->include('panel/layouts/sidebar'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $this->renderSection('content'); ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">JULTDEV</span>

          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/panel_assets/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="/panel_assets/assets/js/off-canvas.js"></script>
  <script src="/panel_assets/assets/js/hoverable-collapse.js"></script>
  <script src="/panel_assets/assets/js/misc.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'
    integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=='
    crossorigin='anonymous'></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js'
    integrity='sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=='
    crossorigin='anonymous'></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js'
    integrity='sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=='
    crossorigin='anonymous'></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.2.1/js/froala_editor.pkgd.min.js'
    integrity='sha512-Y1rv53s7cPSGDrDJwiYpSnsGhet6MK8bzcSwZ8AJLwm4HkNTLUKm7kC/l+i2xOl3i1kO0sjAsYopTu8Y8cX0nw=='
    crossorigin='anonymous'></script>

  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

  <!-- <script src="/panel_assets/upload-image.js"></script> -->

  <?= $this->renderSection('script'); ?>

  <script>
  new DataTable('#datatables');

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  </script>

  <?php
  if (session()->getFlashdata('dataMessage')) {
    foreach (session()->getFlashdata('dataMessage') as $item) {
      echo '<script>toastr["' .
        session()->getFlashdata('type-status') . '"]("' . $item . '")</script>';
    }
  }
  if (session()->getFlashdata('message')) {
    echo '<script>toastr["' .
      session()->getFlashdata('type-status') . '"]("' . session()->getFlashdata('message') . '")</script>';
  }
  ?>

</body>

</html>