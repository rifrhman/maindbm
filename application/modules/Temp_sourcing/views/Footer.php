<footer class="main-footer navbar-navy">
  <div class="float-right d-none d-sm-block">
    <b>Candidate System Management.</b> Ver-1.0
  </div>
  <strong>Copyright &copy; <?= date('F-Y'); ?> </strong>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/dynamic.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sweetalert/dist/sweetalert2.all.min.js') ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>

<script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard.js"></script>

<script>
$('#custom-file-input').on('change', function() {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  Swal.fire(
    'Good job!',
    flashData,
    'success'
  )
}

const flashDataScore = $('.flash-data-score').data('flashdata-score');
if (flashDataScore) {
  Swal.fire(
    'Good job!',
    flashData,
    'success'
  )
}

const flashDataErr = $('.flash-data-err').data('flashdata-err');
if (flashDataErr) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Data kandidat sudah terdaftar.'
  })
}

$(function() {
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["excel", "pdf", "print"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
$(document).ready(function() {
  $('#head').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});
$(document).ready(function() {
  $('#reject').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});

$('input[type="text"]').keyup(function(evt) {
  var txt = $(this).val();


  // Regex taken from php.js (http://phpjs.org/functions/ucwords:569)
  $(this).val(txt.replace(/^(.)|\s(.)/g, function($1) {
    return $1.toUpperCase();
  }));
});

$(document).ready(function() {
  $('#exam').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "ajax": {
      "url": "<?= base_url('sourcing/getDataSour') ?>",
      "type": "POST"
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
    "buttons": ["excel", "pdf", "print"]
  }).buttons().container().appendTo('#exam_wrapper .col-md-6:eq(0)');
});

$('#examscore').DataTable({
  "processing": true,
  "serverSide": true,
  "order": [],
  "responsive": true,
  "lengthChange": true,
  "autoWidth": false,
  "ajax": {
    "url": "<?= base_url('Scorecandidate/getDataScore') ?>",
    "type": "POST"
  },
  "columnDefs": [{
    "target": [-1],
    "orderable": false
  }],
});
</script>


</body>

</html>