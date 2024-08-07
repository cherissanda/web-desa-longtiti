<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Penduduk</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Penduduk Meninggal</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center mb-0">
                <p>Data Penduduk Meninggal</p>
                <a href="#" data-toggle="modal" data-target="#ModalData" class="btn btn-primary btn-sm ms-auto">
                <i class="fa fa-plus"></i>
                Add</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-2">
                <table id="example" class="display" style="width:100%">
                
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Meninggal</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>
                  <tbody>
                  <?php foreach($data_penduduk as $data) { ?>
                  <tr>
                        <td><?=$data->nik;?></td>
                        <td><?=$data->nama_lengkap;?></td>
                        <td><?=$data->tanggal_kematian;?></td>
                        <td><?=$data->alamat;?></td>
                        <td><a href="<?=base_url('/kematian/detail/'.$data->id); ?>">detail</a></td>
                    </tr>
                    <?php }; ?>
                  </tbody>

                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>


<!-- Modal data-->
<div class="modal fade" id="ModalData" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Search NIK</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?=base_url('Kematian/add')?>" method="post">
          <div class="modal-body">
                  <div class="form-group">
                        <label for="no_kk">Nomor Induk Kependudukan (NIK):</label>
                          <div class="input-group form-control">
                          <select class="form-control no_kk" name="nik" id="nik" required>
                          <option value="">Select Nik</option>
                                        <?php foreach ($nik as $row): ?>
                                            <option value="<?php echo $row->nik; ?>"><?php echo $row->nik ; ?></option>
                                        <?php endforeach; ?>
                              </select>
                          </div>
                  </div>
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submitForm">search</button>
          </div>
          </form> 
     </div>
  </div>
</div>

<?php $this->load->view('_partials/footer.php'); ?>
<script>
   $(document).ready(function () {
        $(".no_kk").select2({
         tags: false,
         minimumInputLength: 2,
         maximumInputLength: 16,
         width: '100%',
        });

        $(".no_kk .select2-results").css("max-height","400px");

        $(document).on('keypress', '.select2-search__field', function () {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
        }
           });

    });
</script> 

<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
</script>