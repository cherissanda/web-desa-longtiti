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
            <h6 class="font-weight-bolder text-white mb-0">Approval</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center mb-0">
                <p>List Surat</p>
              </div>
            </div>
            <div class="card-body">
            <div class="table-responsive p-2">
                <table id="example" class="display" style="width:100%">
                
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                  <tbody>
                  <?php foreach($data_surat as $data) { ?>
                  <tr>
                        <td><?=$data->nik;?></td>
                        <td><?
                              if ($data->jenis_surat == '1') {
                                  echo 'Surat Domisili';
                              } elseif ($data->jenis_surat == '2') {
                                  echo 'Surat Pindah';
                              } elseif ($data->jenis_surat == '3') {
                                  echo 'Surat Ket Meninggal';
                              }  elseif ($data->jenis_surat == '4') {
                                echo 'Surat Kelahiran';
                               }else {
                                  echo 'Unknown Surat Type'; // Adjust this default message as per your requirement
                              }
                              ?>
                          </td>
                        <td><?
                        if ($data->status == '0') {
                            echo 'menunggu approval';
                        }elseif($data->status == '99') {
                          echo 'ditolak';
                        } elseif($data->status ==  '1'){
                          echo 'approve';
                        } else {
                          echo 'Unknown status';
                        }
                        ?></td>
                        <td><a href="<?=base_url('/surat/detailSurat/'.$data->id.'?formMode=approval'); ?>">detail</a></td>
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




<?php $this->load->view('_partials/footer.php'); ?>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
</script>