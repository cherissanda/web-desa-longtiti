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
            <h6 class="font-weight-bolder text-white mb-0">Surat Keterangan Kelahiran</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center mb-0">
                <p>Preview Surat Keterangan Kelahiran</p>
              </div>
            </div>
              <div class="card-body">
                <form action="<?=site_url('surat/sukelPreview')?>" method="post">
                  <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik_ayah">NIK AYAH:</label>
                                <select class="form-control" id="nik_ayah" name="nik_ayah" required>
                                  <option value="" selected disabled> === Pilih NIK AYAH ===</option>
                                     <?php foreach($keluarga as $data) {?>
                                    <option value="<?=$data->nik; ?>"><?= $data->nik; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                      </div>
                  </div>
                 
                  <div class="row">
                  <div class="col-md-6">
                          <div class="form-group">
                              <label for="nik_ibu">NIK IBU:</label>
                              <select class="form-control" id="nik_ibu" name="nik_ibu" required>
                                  <option value="" selected disabled> === Pilih NIK IBU ===</option>
                                  <?php foreach($keluarga as $data) {?>
                                    <option value="<?=$data->nik; ?>"><?= $data->nik; ?></option>
                                    <?php } ?>
                              </select>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                          <div class="form-group">
                              <label for="nik_ibu">NIK ANAK:</label>
                              <input type="text" value="<?=$penduduk->nik?>" class="form-control" id="nik_anak" name="nik_anak" required readonly>
                             
                          </div>
                    </div>
                  </div>


                  <div class="row">
                  <div class="col-md-6">
                            <button type="submit" id="submitBtn" class="btn btn-primary">next</button>
                  </div>
                  </div>

                </form>
              </div>
          </div>
        </div>
      </div>
</div>




<?php $this->load->view('_partials/footer.php'); ?>