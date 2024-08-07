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
              <div class="row preview">
                          <?php $this->load->view('surat/surat_kelahiran/layoutSurat.php'); ?>
                        </div>
                      <div class="row">
                        <div class="col-6"></div>
                          <div class="col-6 text-center">
                          <button class="btn btn-primary" id="submitBtn">Generate</button>
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
        var nik_anak = document.getElementById("nik_anak").innerHTML.trim();
        var nama_anak = document.getElementById("nama_anak").innerHTML.trim();
        var tanggal_lahir = document.getElementById("tanggal_lahir").innerHTML.trim();
        var tempat_lahir = document.getElementById("tempat_lahir").innerHTML.trim();
        var jenis_kelamin = document.getElementById("jenis_kelamin").innerHTML.trim();
        var nama_ibu = document.getElementById("nama_ibu").innerHTML.trim();
        var umur_ibu = document.getElementById("umur_ibu").innerHTML.trim();
        var pekerjaan_ibu = document.getElementById("pekerjaan_ibu").innerHTML.trim();
        var alamat_ibu = document.getElementById("alamat_ibu").innerHTML.trim();
        var nama_ayah = document.getElementById("nama_ayah").innerHTML.trim();
        var umur_ayah = document.getElementById("umur_ayah").innerHTML.trim();
        var pekerjaan_ayah = document.getElementById("pekerjaan_ayah").innerHTML.trim();
        var alamat_ayah = document.getElementById("alamat_ayah").innerHTML.trim();

        console.log(nama_anak, tanggal_lahir, tempat_lahir)

        let formData = new FormData();
        formData.append('nik_anak', nik_anak);
          formData.append('nama_anak', nama_anak);
          formData.append('tanggal_lahir', tanggal_lahir);
          formData.append('tempat_lahir', tempat_lahir);
          formData.append('jenis_kelamin', jenis_kelamin);
          formData.append('nama_ibu', nama_ibu);
          formData.append('umur_ibu', umur_ibu);
          formData.append('pekerjaan_ibu', pekerjaan_ibu);
          formData.append('alamat_ibu', alamat_ibu);
          formData.append('nama_ayah', nama_ayah);
          formData.append('umur_ayah', umur_ayah);
          formData.append('pekerjaan_ayah', pekerjaan_ayah);
          formData.append('alamat_ayah', alamat_ayah);

          console.log(formData);

          fetch("<?=site_url('surat/storeSuratKelahiran')?>", { 
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