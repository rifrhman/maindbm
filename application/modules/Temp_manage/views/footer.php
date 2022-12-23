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
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
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
var save_method; //for save method string
var table_basic;

$(document).ready(function() {

  //datatables
  table_basic = $('#candidate_basic_table').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
    "responsive": true,
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo site_url('manage/candidate_basic_list') ?>",
      "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [-1], //last column
        "orderable": false, //set not orderable
      },

    ],
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print']

  });


  //datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,
  });


  //set input/textarea/select event when change value, remove class error and remove text help block 
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


})




function add_person() {
  save_method = 'add';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#modal_form').modal('show'); // show bootstrap modal
  $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}

function edit_person(id_candidate) {
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('manage/candidate_basic_edit/') ?>/" + id_candidate,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="id_candidate"]').val(data.id_candidate);
      $('[name="fullname"]').val(data.fullname);
      $('[name="place_of_birth"]').val(data.place_of_birth);
      // $('[name="date_of_birth"]').val(data.date_of_birth);
      $('[name="date_of_birth"]').datepicker('update', data.date_of_birth);
      $('[name="domicile"]').val(data.domicile);
      $('[name="phone_number"]').val(data.phone_number);
      $('[name="gender"]').val(data.gender);
      $('[name="gender"]').val(data.gender);
      $('[name="last_education"]').val(data.last_education);
      $('[name="test_one"]').val(data.test_one);
      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function reload_table() {
  table_basic.ajax.reload(null, false); //reload datatable ajax 
}

function save() {
  $('#btnSave').text('saving...'); //change button text
  $('#btnSave').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'add') {
    url = "<?php echo site_url('manage/candidate_basic_add') ?>";
  } else {
    url = "<?php echo site_url('manage/candidate_basic_update') ?>";
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
        reload_table();
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

function delete_person(id_candidate) {
  if (confirm('Are you sure delete this data?')) {
    // ajax delete data to database
    $.ajax({
      url: "<?php echo site_url('manage/candidate_basic_del') ?>/" + id_candidate,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        //if success reload ajax table
        $('#modal_form').modal('hide');
        reload_table();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error deleting data');
      }
    });

  }
}


/*

  CANDIDATE SECONDARY AJAX

*/


var table_secondary;
$(document).ready(function() {

  // table secondary
  //datatables
  table_secondary = $('#candidate_secondary_table').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
    "responsive": true,
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo site_url('manage_secondary/candidate_secondary_list') ?>",
      "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [-1], //last column
        "orderable": false, //set not orderable
      },

    ],
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print']

  });

  //datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,
  });


  //set input/textarea/select event when change value, remove class error and remove text help block 
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


})



function add_secondary() {
  save_method = 'add_secondary';
  $('#form_secondary')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#modal_form_secondary').modal('show'); // show bootstrap modal
  $('.modal-title-secondary').text('Add Person'); // Set Title to Bootstrap modal title
}

function edit_secondary(basic_id) {
  save_method = 'update_secondary';
  $('#form_secondary')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('manage_secondary/candidate_secondary_edit/') ?>" + basic_id,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="basic_id"]').val(data.basic_id);
      $('[name="regis_num_candidate"]').val(data.regis_num_candidate);
      $('[name="regis_num_resident"]').val(data.regis_num_resident);
      $('[name="email"]').val(data.email);
      // $('[name="email"]').datepicker('update', data.date_of_birth);
      $('[name="religion"]').val(data.religion);
      $('[name="tall"]').val(data.tall);
      $('[name="weight"]').val(data.weight);
      $('[name="marital_status"]').val(data.marital_status);
      $('[name="postal_code"]').val(data.postal_code);
      $('[name="certificate"]').val(data.certificate);
      $('[name="validity_period"]').val(data.validity_period);
      $('[name="status_test"]').val(data.status_test);
      $('#modal_form_secondary').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title-secondary').text('Edit Person Secondary'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

function reload_table_secondary() {
  table_secondary.ajax.reload(null, false); //reload datatable ajax 
}

function save_secondary() {
  $('#btnSaveSecondary').text('saving...'); //change button text
  $('#btnSaveSecondary').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'add_secondary') {
    url = "<?php echo site_url('manage_secondary/candidate_secondary_add') ?>";
  } else {
    url = "<?php echo site_url('manage_secondary/candidate_secondary_update') ?>";
  }

  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_secondary').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_form_secondary').modal('hide');
        reload_table_secondary();
      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSaveSecondary').text('save'); //change button text
      $('#btnSaveSecondary').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveSecondary').text('save'); //change button text
      $('#btnSaveSecondary').attr('disabled', false); //set button enable 

    }
  });
}

function delete_secondary(basic_id) {
  if (confirm('Are you sure delete this data?')) {
    // ajax delete data to database
    $.ajax({
      url: "<?php echo site_url('manage_secondary/candidate_secondary_del') ?>/" + basic_id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        //if success reload ajax table
        $('#modal_form_secondary').modal('hide');
        reload_table_secondary();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error deleting data');
      }
    });

  }
}

/*

  CANDIDATE SECONDARY AJAX - end

*/


$(document).ready(function() {

  // table secondary
  //datatables
  table_secondary = $('#candidate_education_table').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
    "responsive": true,
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo site_url('manage_education/education_list') ?>",
      "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [-1], //last column
        "orderable": false, //set not orderable
      },

    ],
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print']

  });

  //datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,
  });


  //set input/textarea/select event when change value, remove class error and remove text help block 
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


})



/*

  CANDIDATE EDUCATION

*/



function edit_education(id_education) {
  save_method = 'update_edit';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('manage_education/edu_edit/') ?>" + id_education,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="id_education"]').val(data.id_education);
      $('[name="basic_id"]').val(data.basic_id);
      $('[name="degree"]').val(data.degree);
      $('[name="institute"]').val(data.institute);
      $('[name="major"]').val(data.major);
      $('[name="city"]').val(data.city);
      $('[name="score"]').val(data.score);
      $('[name="year_in_edu"]').val(data.year_in_edu);
      $('[name="year_out_edu"]').val(data.year_out_edu);

      $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title').text('Edit Education'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

// function reload_table() {
//   table.ajax.reload(null, false); //reload datatable ajax 
// }

function save_edit() {
  $('#btnSaveEdit').text('saving...'); //change button text
  $('#btnSaveEdit').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'update_edit') {
    url = "<?php echo site_url('manage_education/edu_update') ?>";
  } else {
    url = "<?php echo site_url('manage_education/edu_update') ?>";
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
        setTimeout(() => {
          location.reload()
        }, 1000);
      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSaveEdit').text('save'); //change button text
      $('#btnSaveEdit').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveEdit').text('save'); //change button text
      $('#btnSaveEdit').attr('disabled', false); //set button enable 

    }
  });
}

function del_education(id_education) {
  if (confirm('Are you sure delete this data?')) {
    // ajax delete data to database
    $.ajax({
      url: "<?php echo site_url('manage_education/edu_delete') ?>/" + id_education,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        //if success reload ajax table
        $('#modal_form').modal('hide');
        setTimeout(() => {
          location.reload()
        }, 1000);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error deleting data');
      }
    });

  }
}

/*

  CANDIDATE EDUCATION - end

*/


$(document).ready(function() {

  // table secondary
  //datatables
  table_secondary = $('#candidate_experience_table').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "lengthMenu": [10, 25, 50, 100, 1000, 10000],
    "responsive": true,
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo site_url('manage_experience/experience_list') ?>",
      "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [-1], //last column
        "orderable": false, //set not orderable
      },

    ],
    "dom": 'lBfrtip',
    "buttons": ['excel', 'csv', 'pdf', 'print']

  });

  //datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,
  });


  //set input/textarea/select event when change value, remove class error and remove text help block 
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




function edit_exp(id_exp) {
  save_method = 'update_edit_exp';
  $('#form_exp')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Ajax Load data from ajax
  $.ajax({
    url: "<?php echo site_url('manage_experience/exp_edit/') ?>" + id_exp,
    type: "GET",
    dataType: "JSON",
    success: function(data) {

      $('[name="id_exp"]').val(data.id_exp);
      $('[name="basic_id"]').val(data.basic_id);
      $('[name="company"]').val(data.company);
      $('[name="position_exp"]').val(data.position_exp);
      $('[name="year_in_exp"]').val(data.year_in_exp);
      $('[name="month_period"]').val(data.month_period);
      $('[name="last_salary"]').val(data.last_salary);
      $('[name="resign"]').val(data.resign);

      $('#modal_form_exp').modal('show'); // show bootstrap modal when complete loaded
      $('.modal-title-exp').text('Edit Experience'); // Set title to Bootstrap modal title

    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error get data from ajax');
    }
  });
}

// function reload_table() {
//   table.ajax.reload(null, false); //reload datatable ajax 
// }

function save_edit_exp() {
  $('#btnSaveEditExp').text('saving...'); //change button text
  $('#btnSaveEditExp').attr('disabled', true); //set button disable 
  var url;

  if (save_method == 'update_edit_exp') {
    url = "<?php echo site_url('manage_experience/exp_update') ?>";
  } else {
    url = "<?php echo site_url('manage_experience/exp_update') ?>";
  }

  // ajax adding data to database
  $.ajax({
    url: url,
    type: "POST",
    data: $('#form_exp').serialize(),
    dataType: "JSON",
    success: function(data) {

      if (data.status) //if success close modal and reload ajax table
      {
        $('#modal_form_exp').modal('hide');
        // reload_table();
        setTimeout(() => {
          location.reload()
        }, 1000);
      } else {
        for (var i = 0; i < data.inputerror.length; i++) {
          $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass(
            'has-error'); //select parent twice to select div form-group class and add has-error class
          $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[
            i]); //select span help-block class set text error string
        }
      }
      $('#btnSaveEditExp').text('save'); //change button text
      $('#btnSaveEditExp').attr('disabled', false); //set button enable 


    },
    error: function(jqXHR, textStatus, errorThrown) {
      alert('Error adding / update data');
      $('#btnSaveEditExp').text('save'); //change button text
      $('#btnSaveEditExp').attr('disabled', false); //set button enable 

    }
  });
}

function del_exp(id_exp) {
  if (confirm('Are you sure delete this data?')) {
    // ajax delete data to database
    $.ajax({
      url: "<?php echo site_url('manage_experience/del_experience') ?>/" + id_exp,
      type: "POST",
      dataType: "JSON",
      success: function(data) {
        //if success reload ajax table
        $('#modal_form_exp').modal('hide');
        setTimeout(() => {
          location.reload()
        }, 1000);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error deleting data');
      }
    });

  }
}
</script>


</body>

</html>