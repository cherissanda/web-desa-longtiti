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
            <h6 class="font-weight-bolder text-white mb-0">Surat Keterangan Kematian</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center mb-0">
                <p>Preview Surat Keterangan Kematian</p>
              </div>
            </div>
            <div class="card-body">
                        <div class="row preview">
                          <?php $this->load->view('surat/surat_meninggal/layoutSurat.php'); ?>
                        </div>

                      <div class="row">
                        <div class="col-6"></div>
                          <div class="col-6 text-center">
                          <button type="submit" id="submitBtn" class="btn btn-primary">Generate</button>
                        </div>
                       </div>    
                    </div>
            
            </div>
          </div>
        </div>
      </div>
</div>




<?php $this->load->view('_partials/footer.php'); ?>
<script>
$(document).ready(function() {
    // Define your function within the document ready block
    function myFunction() {
        var nik = document.getElementById("nik").innerHTML.trim();
        var nama = document.getElementById("nama").innerHTML.trim();
        var ttl = document.getElementById("ttl").innerHTML.trim();
        var jenis_kelamin = document.getElementById("jenis_kelamin").innerHTML.trim();
        var pekerjaan = document.getElementById("pekerjaan").innerHTML.trim();
        var status_perkawinan = document.getElementById("status_perkawinan").innerHTML.trim();
        var kebangsaan = document.getElementById("kebangsaan").innerHTML.trim();
        var agama = document.getElementById("agama").innerHTML.trim();
        var alamat = document.getElementById("alamat").innerHTML.trim();
        var tanggal_kematian = document.getElementById("tanggal_kematian").innerHTML.trim();
      

        console.log(nama);

        let formData = new FormData();
        formData.append('nik',nik);
        formData.append('nama', nama);
        formData.append('ttl', ttl);
        formData.append('jenis_kelamin', jenis_kelamin);
        formData.append('pekerjaan', pekerjaan);
        formData.append('status_perkawinan', status_perkawinan);
        formData.append('kebangsaan', kebangsaan);
        formData.append('agama', agama);
        formData.append('alamat', alamat);
        formData.append('tanggal_kematian', tanggal_kematian);

          console.log(formData);

          fetch("<?=site_url('surat/storeSuratKematian')?>", { 
                method: 'POST',
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                body: formData
            }).then(response => response.json())
              .then(data => {
                  if (data.status === '00') {
                      Swal.fire({
                          title: 'Success!',
                          text: 'Data has been successfully inserted.',
                          icon: 'success',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              window.location.href = "<?=base_url('surat')?>";
                          }
                      });
                  } else {
                      Swal.fire({
                          title: 'Error!',
                          text: data.message,
                          icon: 'error',
                          confirmButtonText: 'OK'
                      });
                  }
              })
              .catch((error) => {
                  console.error('Error:', error);
                  Swal.fire({
                      title: 'Error!',
                      text: 'An unexpected error occurred.',
                      icon: 'error',
                      confirmButtonText: 'OK'
                  });
              });
    }

    // Attach the click event using jQuery
    $('#submitBtn').click(function() {
        myFunction(); // Call your function here
    });

});

</script>