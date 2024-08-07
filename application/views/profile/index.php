<?php $this->load->view('_partials/header.php'); ?>
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
<?php $this->load->view('_partials/navbar.php'); ?>
<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        
      </div>
    </nav>
<!-- end of navbar -->

<!-- profile -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?=base_url('/assets/img/admin.jpg')?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?=ucwords($current_user->nama)?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php
                    if($current_user->role == '1') {
                      echo "Super Admin";
                    }elseif($current_user->role == '2'){
                      echo "Kepala Desa";
                    }elseif($current_user->role == '3'){
                      echo "Sekretaris";
                    }?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            
          </div>
        </div>
      </div>
    </div>
<!-- end of profile -->

<!-- input user -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">

          <form id="adminForm" action="<?=site_url('profile/update/'.$current_user->id); ?>" enctype="multipart/form-data" method="post">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
              </div>
              </div>
              <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" value="<?=$current_user->nama?>" onfocus="focused(this)" onfocusout="defocused(this)" name="nama" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" value="<?=$current_user->username?>" onfocus="focused(this)" onfocusout="defocused(this)" name="username" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Role</label>
                    <input class="form-control" value="<?php
                    if($current_user->role == '1') {
                      echo "Super Admin";
                    }elseif($current_user->role == '2'){
                      echo "Kepala Desa";
                    }elseif($current_user->role == '3'){
                      echo "Sekretaris";
                    }?>" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" type="password" name="password" onfocus="focused(this)" onfocusout="defocused(this)">
                  </div>
                </div>
              </div>
              
              </div>
            </div>
          </form>
        </div>
        
      </div>
    </div>

    <!-- end of inputan user -->
<?php $this->load->view('_partials/footer.php'); ?>
</div>
