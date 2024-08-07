
<footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold" target="_blank">Desa Long Titi</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
             
            </div>
          </div>
        </div>
</footer>



<!-- Modal log out-->
<div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure Want to sing out?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?= site_url('auth/logout') ?>" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>

<?php show_alert(); ?>
<!-- end of modal log out -->

</div>
  </main>
 <!--   Core JS Files   -->
 
 <script src="<?=base_url('assets/js/core/popper.min.js')?>"></script>
<script src="<?=base_url('assets/js/core/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
<script src="<?=base_url('assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.js')?>"></script>
<script src="<?=base_url('assets/select2/dist/js/select2.min.js'); ?>"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('assets/js/argon-dashboard.min.js?v=2.0.4')?>"></script>
  <script>
    $(document).ready(function() {
    $("#ModalLogout").modal();  });
    </script>
</body>

</html>