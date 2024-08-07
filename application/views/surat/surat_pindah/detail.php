<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Surat</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Surat Keterangan Pindah</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="align-items-center mb-0">
                      <div class="row">
                            <div class="col-md-6">
                                <p>Preview Surat Keterangan Pindah</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <?php if($dataSurat->status == '1') { ?>
                                <a href="#" id="printButton" class="btn btn-primary btn-sm ms-auto">
                                <i class="fa fa-print"></i>
                                Print</a>
                                <?php };?>
                                <?php if (isset($formMode)): ?>
                                  <button class="btn btn-warning btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#myModal" data-mode="reject">Reject</button>
                                  <button class="btn btn-primary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#myModal" data-mode="accept">Accept</button>
                                <?php endif; ?>
                            </div>
                      </div>
              </div>
            </div>
            <div class="card-body">
                        <div class="row preview">
                          <?php $this->load->view('surat/surat_pindah/layoutSurat.php'); ?>
                        </div>
            </div>
          </div>
        </div>
      </div>
</div>


<!-- model -->
<div class="modal fade" id="myModal" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"></h5>
      </div>
      <form  action="<?=site_url('surat/approvalSurat/'.$dataSurat->id); ?>" method="post">
        <div class="modal-body">
            <div class="row">
                  <div class="col-md-12">
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>
                          </div>
                  </div>
              </div>
          <input type="hidden" name="reason" id="modalMode" value="">         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="modalSubmit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php $this->load->view('_partials/footer.php'); ?>
<script>
    document.getElementById('printButton').addEventListener('click', function() {
        var printContents = document.querySelector('.row.preview').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
</script>
<script>
$(document).ready(function() {
  $('.btn-sm.ms-auto').click(function() {
    var mode = $(this).data('mode'); // Get button data-mode value
    var title = (mode === 'reject') ? 'Reject Confirmation' : 'Accept Confirmation';
    var content = (mode === 'reject') ? 'Keterangan' : 'Keterangan';

    $('#myModalLabel').text(title); // Set modal title
    $('#modalContent').text(content); // Set modal content
    $('#modalMode').val(mode); // Set hidden field value
  });

  $('#myModal').on('hidden.bs.modal', function () {
    // Reset modal content to defaults (optional)
    $('#myModalLabel').text('');
    $('#modalContent').text('');
    $('#modalMode').val('');
  });
});
</script>