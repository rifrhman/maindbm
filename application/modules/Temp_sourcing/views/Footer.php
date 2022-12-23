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
  $('#head_rec').DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
  });
});


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


// Adding Nilai
function nilai(basic_id) {
  save_method = 'add';
  $('#form_nilai')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  // $('#modal_form').modal('show'); // show bootstrap modal
  // $('.modal-title').text('Add PKWT'); // Set Title to Bootstrap modal title

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('Scorecandidate/nilai_id/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('[name="basic_id"]').val(data.basic_id);
      $('[name="regis_num_candidate"]').val();
      $('[name="regis_num_resident"]').val();
      $('[name="email"]').val();
      $('[name="marital_status"]').val();
      $('[name="religion"]').val();
      $('[name="tall"]').val();
      $('[name="weight"]').val();
      $('[name="postal_code"]').val();
      $('[name="certificate"]').val();
      $('[name="validity_period"]').val();
      $('[name="status_test"]').val();

      $('#modal_nilai').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text(`Tambah Nilai ${data.fullname} `); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}


function save_nilai() {
  $('#btnSaveNilai').text('saving...'); //change button text
  $('#btnSaveNilai').attr('disabled', true); //set button disable 
  var url;


  if (save_method == 'add') {
    url = "<?php echo site_url('Scorecandidate/nilai_add') ?>";
  }
  // } else {
  //   url = "<?php echo site_url('employee/ajax_update') ?>";
  // }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_nilai').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_nilai').modal('hide');
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
      $('#btnSaveNilai').text('save'); //change button text
      $('#btnSaveNilai').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveNilai').text('save'); //change button text
      $('#btnSaveNilai').attr('disabled', false); //set button enable 

    }
  });
}







// Update Test
function test(id_candidate) {
  save_method = 'update';
  $('#form_test')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  // $('#modal_form').modal('show'); // show bootstrap modal
  // $('.modal-title').text('Add PKWT'); // Set Title to Bootstrap modal title

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('Scorecandidate/test_id/') ?>" + id_candidate,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('[name="id_candidate"]').val(data.id_candidate);
      $('[name="test_one"]').val(data.test_one);
      $('[name="test_two"]').val(data.test_two);
      $('[name="test_three"]').val(data.test_three);


      $('#modal_test').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title-test').text(`Update Test ${data.fullname} `); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}


function update_test() {
  $('#btnUpdateTest').text('saving...'); //change button text
  $('#btnUpdateTest').attr('disabled', true); //set button disable 
  var url;


  if (save_method == 'update') {
    url = "<?php echo site_url('Scorecandidate/test_edit') ?>";
  }
  // } else {
  //   url = "<?php echo site_url('employee/ajax_update') ?>";
  // }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_test').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_test').modal('hide');
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
      $('#btnUpdateTest').text('save'); //change button text
      $('#btnUpdateTest').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnUpdateTest').text('save'); //change button text
      $('#btnUpdateTest').attr('disabled', false); //set button enable 

    }
  });
}



// Update Status Test

// Adding Nilai
function status_test(basic_id) {
  save_method = 'update_status';
  $('#form_status')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  // $('#modal_form').modal('show'); // show bootstrap modal
  // $('.modal-title').text('Add PKWT'); // Set Title to Bootstrap modal title

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('Scorecandidate/status_id/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {
      $('[name="basic_id"]').val(data.basic_id);
      $('[name="status_test"]').val(data.status_test);

      $('#modal_status').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text(`Update Status ${data.fullname} `); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}




function update_status_test() {
  $('#btnUpdateStatus').text('saving...'); //change button text
  $('#btnUpdateStatus').attr('disabled', true); //set button disable 
  var url;


  if (save_method == 'update_status') {
    url = "<?php echo site_url('Scorecandidate/status_edit') ?>";
  }
  // } else {
  //   url = "<?php echo site_url('employee/ajax_update') ?>";
  // }


  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_status').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_status').modal('hide');
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
      $('#btnUpdateStatus').text('save'); //change button text
      $('#btnUpdateStatus').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnUpdateStatus').text('save'); //change button text
      $('#btnUpdateStatus').attr('disabled', false); //set button enable 

    }
  });
}
</script>


</body>

</html>