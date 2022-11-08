<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y'); ?> </strong>
  All rights reserved.

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="<?= base_url('assets/') ?>plugins/jquery/jquery-3.6.0.js"></script> -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sweetalert/dist/sweetalert2.all.min.js') ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.dateTime.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url('assets/'); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
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




<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->

<script>
$(function() {
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
});

$(document).ready(function() {
  $("#contract").DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "ajax": {
      "url": "<?= base_url('contract/getDataScore') ?>",
      "type": "POST"
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
  })
})





var minDate, maxDate;

// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
  function(settings, data, dataIndex) {
    var min = minDate.val();
    var max = maxDate.val();
    var date = new Date(data[6]);

    if (
      (min === null && max === null) ||
      (min === null && date <= max) ||
      (min <= date && max === null) ||
      (min <= date && date <= max)
    ) {
      return true;
    }
    return false;
  }
);

$(document).ready(function() {
  // Create date inputs
  minDate = new DateTime($('#min'), {
    format: 'YYYY-MM-DD'
  });
  maxDate = new DateTime($('#max'), {
    format: 'YYYY-MM-DD'
  });

  // DataTables initialisation
  var table = $('#employee').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "searching": true,
    "ajax": {
      "url": "<?= base_url('employee/getDataScore') ?>",
      "type": "POST",
      "data": function(data) {
        data.min = $('#min').val();
        data.max = $('#max').val();
      },
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
  });

  // $('#min, #max').change(function() {
  //   table.draw();
  // })
  // // Refilter the table
  $('#min, #max').on('change', function() {
    table.draw();
  });
});

$(document).ready(function() {
  $("#pkwt").DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "ajax": {
      "url": "<?= base_url('pkwt/getDataScore') ?>",
      "type": "POST"
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print'],
    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
  })
})

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  Swal.fire(
    'Good job!',
    flashData,
    'success'
  )
}


$('.deleted-confirm').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa anda yakin hapus?',
    text: "Anda tidak bisa mengulangi data ini kembali!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  })

})
$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
  autoClose: true,
  todayHighlight: true
})


//fungsi untuk filtering data berdasarkan tanggal 
var start_date;
var end_date;
var DateFilterFunction = (function(oSettings, aData, iDataIndex) {
  var dateStart = parseDateValue(start_date);
  var dateEnd = parseDateValue(end_date);
  //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
  //nama depan = 0
  //nama belakang = 1
  //tanggal terdaftar =2
  var evalDate = parseDateValue(aData[2]);
  if ((isNaN(dateStart) && isNaN(dateEnd)) ||
    (isNaN(dateStart) && evalDate <= dateEnd) ||
    (dateStart <= evalDate && isNaN(dateEnd)) ||
    (dateStart <= evalDate && evalDate <= dateEnd)) {
    return true;
  }
  return false;
});

// // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
// function parseDateValue(rawDate) {
//   var dateArray = rawDate.split("/");
//   var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[
//     0]); // -1 because months are from 0 to 11   
//   return parsedDate;
// }

// $(document).ready(function() {
//   //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
//   var $dTable = $('#employee').DataTable({
//     "dom": "<'row'<'col-sm-4'l><'col-sm-5' class='mb-3' <'datesearchbox'>><'col-sm-3'f>>" +
//       "<'row'<'col-sm-12'tr>>" +
//       "<'row'<'col-sm-5'i><'col-sm-7'p>>",
//     "processing": true,
//     "serverSide": true,
//     "order": [],
//     "responsive": true,
//     "lengthChange": true,
//     "autoWidth": false,
//     "searching": true,
//     "ajax": {
//       "url": "<?= base_url('employee/getDataScore') ?>",
//       "type": "POST"
//     },
//     "columnDefs": [{
//       "target": [-1],
//       "orderable": false
//     }],

//   });

//   //menambahkan daterangepicker di dalam datatables
//   $("div.datesearchbox").html(
//     '<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>'
//   );

//   document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

//   //konfigurasi daterangepicker pada input dengan id datesearch
//   $('#datesearch').daterangepicker({
//     autoUpdateInput: false
//   });

//   //menangani proses saat apply date range
//   $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
//     $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
//     start_date = picker.startDate.format('DD/MM/YYYY');
//     end_date = picker.endDate.format('DD/MM/YYYY');
//     $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
//     $dTable.draw();
//   });

//   $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
//     $(this).val('');
//     start_date = '';
//     end_date = '';
//     $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
//     $dTable.draw();
//   });
// });
</script>


</body>

</html>