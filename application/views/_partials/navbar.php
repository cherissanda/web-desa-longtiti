<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="<?=base_url('assets/img/logo.png')?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">DESA LONG TITI</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('/')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/penduduk')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user-plus text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Penduduk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/kematian')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-heartbeat text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Kematian</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/kelahiran')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-venus-mars text-info text-sm opacity-10"></i>
                </div>
            <span class="nav-link-text ms-1">Data Kelahiran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/pindah')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-map-marker text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Pindah</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Surat</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('/surat/create')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-file-text-o text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Buat Surat</span>
          </a>
          <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/surat')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-print text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">List Surat</span>
          </a>
        </li>
        <?php if(($current_user->role === '1') OR ($current_user->role === '2' )) { ?>
          <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/surat/approval')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-folder-open-o text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Approval Surat</span>
          </a>
        </li>
        
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Admin page</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/admin')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user-plus text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Admin</span>
          </a>
        </li>
        <?php }; ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?=base_url('/profile')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#ModalLogout">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Out</span>
          </a>

        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">