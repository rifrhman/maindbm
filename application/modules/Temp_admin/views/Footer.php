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
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print'],
    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
  });

  // $('#min, #max').change(function() {
  //   table.draw();
  // })
  // // Refilter the table
  $('#min, #max').on('change', function() {
    table.draw();
  });

  $("input").change(function() {
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });
  $("textarea").change(function() {
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });
  $("select").change(function() {
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
  });

});

let tableSignin = $(document).ready(function() {
  $('#signin').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "searching": true,
    "ajax": {
      "url": "<?= base_url('signin/getDataScore') ?>",
      "type": "POST",
      // "data": function(data) {
      //   data.min = $('#min').val();
      //   data.max = $('#max').val();
      // },
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
    // "dom": 'lBfrtip',
    // "buttons": ['excel', 'csv', 'pdf', 'print'],
    // "lengthMenu": [10, 25, 50, 100, 1000, 10000],
  });
})

let tableDrop = $(document).ready(function() {
  $('#dropout').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "searching": true,
    "ajax": {
      "url": "<?= base_url('dropout/getDataScore') ?>",
      "type": "POST",
      // "data": function(data) {
      //   data.min = $('#min').val();
      //   data.max = $('#max').val();
      // },
    },
    "columnDefs": [{
      "target": [-1],
      "orderable": false
    }],
    // "dom": 'lBfrtip',
    // "buttons": ['excel', 'csv', 'pdf', 'print'],
    // "lengthMenu": [10, 25, 50, 100, 1000, 10000],
  });
})


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


$(document).ready(function() {
  $("#resigntable").DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "ajax": {
      "url": "<?= base_url('resign/getDataScore') ?>",
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
$(document).ready(function() {
  $("#blacklist_karyawan").DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "ajax": {
      "url": "<?= base_url('blacklist/getDataScore') ?>",
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

function add_person(basic_id) {
  save_method = 'add';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  // $('#modal_form').modal('show'); // show bootstrap modal
  // $('.modal-title').text('Add PKWT'); // Set Title to Bootstrap modal title

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('employee/ajax_add_id/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('[name="basic_id"]').val(data.basic_id);
      $('[name="id"]').val();
      $('[name="pkwt_number"]').val();
      $('[name="date_pkwt"]').val();
      $('[name="start_of_contract"]').val();
      $('[name="end_of_contract"]').val();
      $('[name="desc_pkwt"]').val();
      $('[name="status_pkwt"]').val();

      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Add PKWT'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}


function save() {
  $('#btnSave').text('saving...'); //change button text
  $('#btnSave').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'add') {
    url = "<?php echo site_url('employee/ajax_add') ?>";
  } else {
    url = "<?php echo site_url('employee/ajax_update') ?>";
  }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_form').modal('hide');
        // reload_table();
        Swal.fire(
          'Good job!',
          flashData,
          'success'
        )
        setTimeout(function() { // wait for 5 secs(2)
          location.reload(); // then reload the page.(3)
        }, 3000);
      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSave').text('save'); //change button text
      $('#btnSave').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSave').text('save'); //change button text
      $('#btnSave').attr('disabled', false); //set button enable 

    }
  });
}


function edit_person(id) {
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('employee/ajax_edit/') ?>" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="id"]').val(data.id);
      $('[name="pkwt_number"]').val(data.pkwt_number);
      $('[name="date_pkwt"]').val(data.date_pkwt);
      $('[name="start_of_contract"]').val(data.start_of_contract);
      $('[name="end_of_contract"]').val(data.end_of_contract);
      $('[name="status_pkwt"]').val(data.status_pkwt);
      $('[name="desc_pkwt"]').val(data.desc_pkwt);

      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Reminder'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function edit_join(basic_id) {
  save_method = 'update';
  $('#form_edit_join')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('signin/join_edit/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="basic_id"]').val(data.basic_id);
      $('[name="is_join"]').val(data.is_join);
      $('[name="confirm"]').val(data.confirm);
      $('[name="confirm_admin"]').val(data.confirm_admin);



      $('#modal_edit_join').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Edit JOIN'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function save_edit_join() {
  $('#btnSaveJoin').text('saving...'); //change button text
  $('#btnSaveJoin').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'add') {
    url = "<?php echo site_url('signin/ajax_add') ?>";
  } else {
    url = "<?php echo site_url('signin/update_join') ?>";
  }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_edit_join').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_edit_join').modal('hide');
        Swal.fire(
          'Good job!',
          flashData,
          'success'
        )
        setTimeout(function() { // wait for 5 secs(2)
          location.reload(); // then reload the page.(3)
        }, 3000);

      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSaveJoin').text('save'); //change button text
      $('#btnSaveJoin').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveJoin').text('save'); //change button text
      $('#btnSaveJoin').attr('disabled', false); //set button enable 

    }
  });
}


function out_emp(basic_id) {
  save_method = 'update';
  $('#form_out_emp')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('dropout/out_emp/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="basic_id"]').val(data.basic_id);
      $('[name="flags_resign"]').val(data.flags_resign);
      // $('[name="date_pkwt"]').val(data.date_pkwt);
      // $('[name="start_of_contract"]').val(data.start_of_contract);
      // $('[name="end_of_contract"]').val(data.end_of_contract);
      // $('[name="status_pkwt"]').val(data.status_pkwt);
      // $('[name="desc_pkwt"]').val(data.desc_pkwt);

      $('#modal_out_emp').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Resign Out Karyawan'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function save_out_emp() {
  $('#btnSaveOut').text('saving...'); //change button text
  $('#btnSaveOut').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'add') {
    url = "<?php echo site_url('signin/ajax_add') ?>";
  } else {
    url = "<?php echo site_url('dropout/update_out') ?>";
  }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_out_emp').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_out_emp').modal('hide');
        Swal.fire(
          'Good job!',
          flashData,
          'success'
        )
        setTimeout(function() { // wait for 5 secs(2)
          location.reload(); // then reload the page.(3)
        }, 3000);

      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSaveOut').text('save'); //change button text
      $('#btnSaveOut').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveOut').text('save'); //change button text
      $('#btnSaveOut').attr('disabled', false); //set button enable 

    }
  });
}



// function reload_table() {
//   tableSignin.ajax.reload(null, false); //reload datatable ajax 
// }

// function autoRefreshPage() {
//   windowwindow.location = window.location.href;
// }







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
</script>


</body>

</html>