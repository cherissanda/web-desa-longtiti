<?php $this->load->view('_partials/header.php'); ?>
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-center">
                  <h4 class="font-weight-bolder">Login</h4>
                
                  <?php if($this->session->flashdata('message_login_error')): ?>
                  <div class="is-invalid">
                  <p class="mb-0"> <?= $this->session->flashdata('message_login_error') ?> </p>
                  </div>
                <?php endif ?>
                </div>
                <div class="card-body">
                <!-- login view -->
                  <form action="<?=site_url('auth/login'); ?>" method="post" role="form">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="username" name="username">
                      <div class="is-invalid">
                        <?= form_error('username') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                      <div class="is-invalid">
                        <?= form_error('password') ?>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
               

              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('<?=base_url('assets/img/logo.jpeg')?>');background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Intimung Indah, tertib, makmur, dan unggul"</h4>
                <p class="text-white position-relative">Sekretariat Desa Long TITI</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php $this->load->view('_partials/footer.php'); ?>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>