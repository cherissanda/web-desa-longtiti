<?php $this->load->view('_partials/header.php'); ?>
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<?php $this->load->view('_partials/navbar.php'); ?>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Admin</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Admin</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center mb-0">
                <p class="mb-0">Data Admin</p>
                <a href="<?=base_url('/admin/add')?>"class="btn btn-primary btn-sm ms-auto">
                <i class="fa fa-plus"></i>
                Add</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive p-2">
                <table id="example" class="display" style="width:100%">
                <thead>
                      <tr>
                          <th>username</th>
                          <th>nama</th>
                          <th>role</th>
                          <th></th>
                        </tr>
                </thead>
                <tbody>
                  <?php foreach($admin as $data) { ?>
                  <tr>  
                        <td><?=$data->username;?></td>
                        <td><?=$data->nama;?></td>
                        <td><?php
                              if ($data->role == '1') {
                                  echo 'Superadmin';
                              } elseif ($data->role == '2') {
                                  echo 'Kepala Desa';
                              } elseif ($data->role == '3') {
                                  echo 'Sekretaris';
                              };
                              ?></td>
                        <td><a href="<?=base_url('/admin/edit/'.$data->id); ?>">edit</a></td>
                    </tr>
                    <?php }; ?>
                  </tbody>
                </table>

                  
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