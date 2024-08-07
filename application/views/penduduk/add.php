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
            <h6 class="font-weight-bolder text-white mb-0">Tambah Penduduk</h6>
            </nav>
        </div>
    </nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <h4>Tambah Data Penduduk</h4>
            </div>
            <div class="card-body">    
                <form id="pendudukForm" action="<?=site_url('Penduduk/store'); ?>" method="post" enctype="multipart/form-data">  

                <!-- baris pertama -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kk">No KK:</label>
                                    <div class="input-group form-control mb-4">
                                        <!-- Replace the input field with a select element -->
                                        <select class="form-control no_kk" name="no_kk" id="no_kk" required>
                                            <option value="">Select No KK</option>
                                            <?php foreach ($no_kk as $row): ?>
                                                <option value="<?=$row->no_kk; ?>"><?=$row->no_kk; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_kk">NIK:</label>
                                        <input type="text" class="form-control" id="nik" name="nik" required>
                                    </div>
                            </div>
                        </div>

                        <!-- baris kedua -->
                        <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap:</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan:</label>
                                        <select class="form-control" id="pendidikan" name="pendidikan">
                                        <option value="" selected disabled> === Pilih ===</option>
                                                            <?php foreach($master_data as $data) { 
                                                                if($data->deskripsi == 'pendidikan')
                                                            { $optpd = json_decode($data->value);
                                                                foreach ($optpd as $item) {
                                                                ?>
                                                            <option value="<?php echo $item ?>"> <?php echo $item; ?></option>
                                                            <?php } 
                                                            }
                                                        } ?>
                                        </select>
                                    </div>
                                    </div>
                            
                        </div>

                        <!-- baris ke tiga -->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_dalam_keluarga">Status Dalam Keluarga:</label>
                                        <select class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" required>
                                        <option value="" selected disabled> === Pilih ===</option>
                                            <?php foreach($master_data as $data) { 
                                                if($data->deskripsi == 'status_dalam_keluarga')
                                            { $opts = json_decode($data->value);
                                                foreach ($opts as $item) {
                                                ?>
                                            <option value="<?php echo $item ?>"> <?php echo $item; ?></option>
                                            <?php } 
                                            }
                                        } ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                    <option value="" selected disabled> === Pilih ===</option>
                                                            <?php foreach($master_data as $data) { 
                                                                if($data->deskripsi == 'pekerjaan')
                                                            { $optPE = json_decode($data->value);
                                                                foreach ($optPE as $item) {
                                                                ?>
                                                            <option value="<?php echo $item ?>"> <?php echo $item; ?></option>
                                                            <?php } 
                                                            }
                                                        } ?>
                                                    </select>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- baris empat -->
                        <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="status_perkawinan">Status Perkawinan:</label>
                                                    <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                                                    <option value="" selected disabled> === Pilih ===</option>
                                                            <?php foreach($master_data as $data) { 
                                                                if($data->deskripsi == 'status_kawin')
                                                            { $optsp = json_decode($data->value);
                                                                foreach ($optsp as $item) {
                                                                ?>
                                                            <option value="<?php echo $item ?>"> <?php echo $item; ?></option>
                                                            <?php } 
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required maxlength="50" onkeyup="limitCharacters(this, 50)">
                                </div>
                                </div>

                            
                        </div>

                        <!-- baris ke lima -->

                        <div class="row">
                            <div class="col-md-6">

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" selected disabled> === Pilih ===</option>
                                    <option value="LAKI-LAKI"> LAKI-LAKI</option>
                                    <option value="PEREMPUAN"> PEREMPUAN </option>
                                </select>
                            </div>


                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rt">RT:</label>
                                    <input type="text" class="form-control" min="1" max="10" id="rt" name="rt" required>
                                </div>
                            </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rw">RW:</label>
                                        <input type="text" class="form-control" min="1" max="10"  id="rw" name="rw" required>
                                    </div>
                                </div>
                        </div>

                        <!-- baris ke enam -->

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>

                            </div>
                            <div class="col-md-6">

                            <div class="form-group">
                                <label for="kelurahan">Kelurahan:</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                            </div>

                            </div>
                        </div>

                        <!-- baris ke tujuh -->


                        <div class="row">
                            <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                    </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agama">Agama:</label>
                                    <select class="form-control" id="agama" name="agama">
                                    <option value="" selected disabled> === Pilih ===</option>
                                                            <?php foreach($master_data as $data) { 
                                                                if($data->deskripsi == 'agama')
                                                            { $optA = json_decode($data->value);
                                                                foreach ($optA as $item) {
                                                                ?>
                                                            <option value="<?php echo $item ?>"> <?php echo $item; ?></option>
                                                            <?php } 
                                                            }
                                                        } ?>
                                    </select>
                                </div>
                                

                            </div>

                        
                        </div>

                        <!-- baris ke delapan -->

                        <div class="row">
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="file">File:</label>
                                        <input type="file" class="form-control" id="data_file" name="data_file">
                                    </div>

                            </div>

                        

                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <button type="submit" id="submitBtn" class="btn btn-primary">Save</button>
                            </div>
                        
                        </div>

                </form>   
            </div>
          </div>
        </div>
      </div>
</div>


<?php $this->load->view('_partials/footer.php'); ?>
<script>
    $(document).ready(function () {
        $(".no_kk").select2({
         tags: true,
         minimumInputLength: 2,
         maximumInputLength: 16,
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
    document.addEventListener('DOMContentLoaded', function () {
    // Select the form and submit button
    var form = document.getElementById('pendudukForm');
    var submitBtn = document.getElementById('submitBtn');

    // Attach a click event listener to the submit button
    submitBtn.addEventListener('click', function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Check if all required inputs are filled
        var requiredInputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        var isValid = true;
        requiredInputs.forEach(function(input) {
            if (!input.value) {
                isValid = false;
            }
        });

        // If all required inputs are filled, show Sweet Alert confirmation dialog
        if (isValid) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to submit the form.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5e72e4',
                cancelButtonColor: '#f5365c',
                confirmButtonText: 'Yes'
            }).then((result) => {
                // If the user confirms, submit the form
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            // If any required input is empty, show an error message
            Swal.fire({
                title: 'Oops...',
                text: 'Please fill in all required fields.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});
    </script>

<script>
function limitCharacters(inputField, maxLength) {
  var currentLength = inputField.value.length;

  if (currentLength > maxLength) {
    inputField.value = inputField.value.substring(0, maxLength);
  }
}
</script>
