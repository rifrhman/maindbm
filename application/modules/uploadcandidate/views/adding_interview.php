<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Upload Psikogram</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?= $this->session->flashdata('msg'); ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <form action="<?= base_url('uploadcandidate/add_interview/') . $basic['id_candidate'] ?>" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="id_candidate" value="<?= $basic['id_candidate']; ?>">
            <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" name="fullname" class="form-control" id="fullname" value="<?= $basic['fullname'] ?>"
                readonly>
            </div>
            <div class="form-group">
              <label for="interview">Interview kandidat <?= $basic['fullname'] ?> </label>
              <input type="file" name="interview" class="form-control" id="interview" accept=".pdf"
                value="<?= $basic['interview'] ?>">
            </div>
            <div class="form-group col-lg-4">
              <label for="status_test">Submit Interview</label>
              <button type="submit" class="form-control btn btn-primary font-weight-bold"><i
                  class="fas fa-fw fa-file"></i>
                Upload Interview</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>


</div>